<?

/*******************************************************************************
* Filename : stats.php
* Description : stats library
*******************************************************************************/

class stats
{

    /***************************************************************************
    * Description : log user stats
    ***************************************************************************/
	function log_stats($page_id)
    {
        global $app, $HTTP_USER_AGENT, $REMOTE_ADDR;
		$app[current_page] = $page_id;
		$year = date('Y');
        $hour = date('g a');
        $week = date('w');
        $month = date('F');

		## total hit        
        $sql = "select * from {$app[table][stats_hit]}
                where year = '$year'";
        db::query($sql, $rs, $nr);
        if ($nr):
            $sql = "update {$app[table][stats_hit]} 
                    set counter = counter + 1
                    where year = '$year'";
        else:
            $sql = "insert into {$app[table][stats_hit]} (counter, year) values(1,'$year')";
        endif;
        db::qry($sql);
        
        ## by page
        $sql = "select * from {$app[table][stats_page]}
                where page_id = '$page_id' and year = '$year'";
        db::query($sql, $rs, $nr);
        if ($nr):
            $sql = "update {$app[table][stats_page]} 
                   	set counter = counter + 1
					where page_id = '$page_id' and year = '$year'";
        else:
            $sql = "insert into {$app[table][stats_page]} (page_id, counter, year) values('$page_id',1,'$year')";
        endif;
        db::qry($sql);
	
        ## by browser
        if (eregi("Nav", $HTTP_USER_AGENT) || eregi("Gold", $HTTP_USER_AGENT) || eregi("X11", $HTTP_USER_AGENT) || eregi("en-US", $HTTP_USER_AGENT) || eregi("Netscape", $HTTP_USER_AGENT) || eregi("Mozilla/4.74", $HTTP_USER_AGENT)):
            $browser = "Netscape";
        elseif (eregi("Lynx", $HTTP_USER_AGENT)): 
            $browser = "Lynx";
        elseif (eregi("Opera", $HTTP_USER_AGENT)): 
            $browser = "Opera";
        elseif (eregi("Konqueror", $HTTP_USER_AGENT)): 
            $browser = "Konqueror";
        elseif (eregi("Bot", $HTTP_USER_AGENT) || eregi("Google", $HTTP_USER_AGENT) || eregi("Slurp", $HTTP_USER_AGENT) || eregi("Scooter", $HTTP_USER_AGENT) || eregi("Spider", $HTTP_USER_AGENT) || eregi("Infoseek", $HTTP_USER_AGENT)):
            $browser = "Bot";
        elseif (eregi("MSIE", $HTTP_USER_AGENT)):
            $browser = "MSIE";
        else:
            $browser = "Other";
        endif;
        
        $sql = "select * from {$app[table][stats_browser]}
                where browser = '$browser' and year = '$year'";
        db::query($sql, $rs, $nr);
        if ($nr):
            $sql = "update {$app[table][stats_browser]} 
                    set counter = counter + 1
                    where browser = '$browser' and year = '$year'";
        else:
            $sql = "insert into {$app[table][stats_browser]} (browser, counter, year) values('$browser',1,'$year')";
        endif;        
        db::qry($sql);        
	
        ## by OS
        if (eregi("Win", $HTTP_USER_AGENT)):
            $os = "Windows";
        elseif (eregi("Mac", $HTTP_USER_AGENT)): 
            $os = "Mac";
        elseif (eregi("PPC", $HTTP_USER_AGENT)): 
            $os = "Mac";
        elseif (eregi("Linux", $HTTP_USER_AGENT)): 
            $os = "Linux";
        elseif (eregi("FreeBSD", $HTTP_USER_AGENT)): 
            $os = "FreeBSD";
        elseif (eregi("SunOS", $HTTP_USER_AGENT)):
            $os = "SunOS";
        elseif (eregi("IRIX", $HTTP_USER_AGENT)):
            $os = "IRIX";
        elseif (eregi("BeOS", $HTTP_USER_AGENT)):
            $os = "BeOS";
        elseif (eregi("OS/2", $HTTP_USER_AGENT)):
            $os = "OS2";
        elseif (eregi("AIX", $HTTP_USER_AGENT)):
            $os = "AIX";
        else:
            $os = "Other";
        endif;
        
        $sql = "select * from {$app[table][stats_os]}
                where os = '$os' and year = '$year'";
        db::query($sql, $rs, $nr);
        if ($nr):
            $sql = "update {$app[table][stats_os]} 
                    set counter = counter + 1
                    where os = '$os' and year = '$year'";
        else:
            $sql = "insert into {$app[table][stats_os]} (os, counter, year) values('$os',1,'$year')";
        endif;
		db::qry($sql);
	
		## by hour
		$sql = "select * from {$app[table][stats_hour]}
                where jam = '$hour' and year = '$year'";
        db::query($sql, $rs, $nr);
        if ($nr):
            $sql = "update {$app[table][stats_hour]} 
                    set counter = counter + 1
                    where jam = '$hour' and year = '$year'";
        else:
            $sql = "insert into {$app[table][stats_hour]} (jam, counter, year) values('$hour',1,'$year')";
        endif;
		db::qry($sql);
		
		## by weekday
		$sql = "select * from {$app[table][stats_week]}
                where hari = '$week' and year = '$year'";
        db::query($sql, $rs, $nr);
        if ($nr):
            $sql = "update {$app[table][stats_week]} 
                    set counter = counter + 1
                    where hari = '$week' and year = '$year'";
        else:
            $sql = "insert into {$app[table][stats_week]} (hari, counter, year) values('$week',1,'$year')";
        endif;
		db::qry($sql);
			
        ## by month
        $sql = "select * from {$app[table][stats_month]}
                where bulan = '$month' and year = '$year'";
        db::query($sql, $rs, $nr);
        if ($nr):
            $sql = "update {$app[table][stats_month]} 
                    set counter = counter + 1
                    where bulan = '$month' and year = '$year'";
        else:
            $sql = "insert into {$app[table][stats_month]} (bulan, counter, year) values('$month',1,'$year')";
        endif;
		db::qry($sql);
    	
    	## by IP
    	$ip = $REMOTE_ADDR;
    	#$hostname = @gethostbyaddr($ip);
		$hostname = $ip;
		$sql = "select * from {$app[table][stats_ip]} where ip = '$ip' and year = '$year'";
		#echo $sql;exit;
        db::query($sql, $rs, $nr);
        if ($nr):
            $sql = "update {$app[table][stats_ip]} 
                    set counter = counter + 1
                    where ip = '$ip' and year = '$year'";
        else:
            $sql = "insert into {$app[table][stats_ip]} (ip, hostname, counter, year) values('$ip','$hostname', 1, '$year')";
        endif;
        db::qry($sql);
	}

}

?>