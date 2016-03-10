<?

/*******************************************************************************
* Filename : libadm.php
* Description : admin library
*******************************************************************************/

class libstd
{
    function display_block_header($title,$menu='',$model = '')
	{
	    global $app;
		$theme = ($app['me']['theme']) ? $app['me']['theme'] : "default";
		/*$theme="metal_blue";*/
		if (!$model):
			$user = app::unserialize64($_SESSION[stdsiakadsession]);
			include "$app[path]/style/blk_header.php";
		else:
			include "$app[path]/style/blk_header_".$model.".php";
		endif;
	}

	function display_block_footer($status='',$menu='',$submenu='',$status='',$model = '')
	{
	    global $app, $nav;
		//db::close();
		if($status):
			$shw_tab=true;
		endif;
		if (!$model):
			include "$app[path]/style/blk_footer.php";
		else:
			include "$app[path]/style/blk_footer_".$model.".php";
		endif;
		db::close();
	}

	function display_block_menu()
	{
	    global $app;
		include "$app[path]/style/blk_menu.php";
	}

	function display_block_back()
	{
	    global $app,$nav;
		include "$app[path]/style/blk_back.php";
	}

	function display_block_news()
	{
	    global $app;
	}

    /***************************************************************************
    * Description : display msg
    * Parameters : $msg_title, $msg_content
    ***************************************************************************/
    function display_msg($msg_title, $msg_content)
    {
		global $app;
		include "$app[path]/dsp_msg.php";
		exit;
    }

    /***************************************************************************
    * Description : display stat
    * Parameters : $msg_title, $msg_content
    ***************************************************************************/
    function display_stat($msg_title, $msg_content)
    {
		global $app;
		include "$app[path]/admin/log/dsp_reset.php";
		exit;
    }

	/*******************************************************************************
	* Description : validating admin
	* Parameters : $application
	* Variables : $_SESSION[adminsession] = admin session variables
	*******************************************************************************/
	function validate($application = '')
	{
		global $app;
		//print $_SESSION[adminsession];
		//exit;
		if (!strlen($_SESSION['stdsiakadsession'])):
			libstd::display_msg($app['lang']['error']['title'], $app['lang']['error']['adm_not_login']);
		endif;
		$app['me'] = app::unserialize64($_SESSION['stdsiakadsession']);
		$app['me']['reg_akademik']=explode('|',$_SESSION['reg_akademik']);
		$app['me']['sks_ambil']=explode('|',$_SESSION['sks_ambil']);
        $app['me']['pa']=$_SESSION['pa'];
        $app['me']['nama_prodi']=$_SESSION['nama_prodi'];
	}

	/*******************************************************************************
	* Description : check admin previlages
	* Parameters : $application
	*******************************************************************************/
	function has_access($application = '', $userapp)
	{
		global $app;
		if ($application):
			$applications = explode(',', $application);
			$retval = FALSE;
			while (list(, $v) = @each($applications)):
				if (ereg($v, $userapp) && !ereg($v.'_0', $userapp)):
					$retval = TRUE;
				endif;
			endwhile;
			return $retval;
		endif;
		return FALSE;
	}

	/***************************************************************************
	* Description : create a button for messages
	***************************************************************************/
	function create_button($button)
	{
		$ret = "<br><br><div align='center'><form>";
		while (list($name, $jurl) = each($button)):
			$ret .= "<input type='button' value='$name' class='btn' onclick=\"$jurl\"> ";
		endwhile;
		$ret .= "</form></div><br>";
		return $ret;
	}

	/***************************************************************************
	* Description : create role colspan
	***************************************************************************/
	function  get_role_colspan() {
		global $app;
		$args = func_get_args();
		$default = $args[count($args) - 1];
		unset($args[count($args) - 1]);
		while (list($k, $v) = @each($args)):
			$part = explode(',', $v);
			if (ereg($part[0], $app[me][application])):
				$colspan = $part[1];
				break;
			endif;
		endwhile;
		if (!$colspan):
			$colspan = $default;
		endif;
		return $colspan;
	}

	/***************************************************************************
    * Description : Check NA
    ***************************************************************************/

	function check_na($na)
	{
		global $app;
		$na = strtoupper($na);
		if ($na == 'NA' || $na == 'N/A' || $na == 'NA@NA.NA' || $na == ''):
			return true;
		else:
			return false;
		endif;
	}

	/***************************************************************************
	* Description : log user stats
	***************************************************************************/
	function log_admin($user_id, $action, $page, $data)
	{
        global $app;
		$id = strtoupper(md5(uniqid(rand(), true)));
		while (db::lookup('id', 'log_admin', 'id', $id)):
			$id = strtoupper(md5(uniqid(rand(), true)));
		endwhile;

		$sql = "insert into {$app[table][log_admin]}
				(id, data_id, user_id, action, page, action_date) values
				('$id', '$data', '$user_id', '$action', '$page', now())";
        db::qry($sql);
	}

	function log_user($user_id, $action, $data='')
	{
        	global $app;
                if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    		{
      			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
		  	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
		  	$ip=$_SERVER['REMOTE_ADDR'];
		}
		$ip_klien=$ip;
		$ip_server=$_SERVER['SERVER_ADDR'];
		$domain=$_SERVER['HTTP_HOST'];
		//$wktskr=date('Y-m-d H:i:s');
        //$wktskr=$app['wkt_skr_db'];
		//$isp = geoip_isp_by_name($ip_klien);
		$sql = "insert into {$app[table][log_user]}
				(action,datetime,userid,ip_server,domain,ip_client,reference,isp) values
				('$action',now(), '$user_id', '$ip_server','$domain','$ip_klien','$data','$isp')";
		// cek data
		if($ip_klien!='127.0.0.1' && $ip_klien!='192.168.1.120'):
        		db::qry($sql);
		endif;
	}

}

?>
