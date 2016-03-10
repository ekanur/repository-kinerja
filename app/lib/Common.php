<?php
namespace App\lib;
class Common {

	/***************************************************************************
	* Description : load lib
	***************************************************************************/
	function load_lib()
	{
		global $app;
		$numargs = func_num_args();
		$args = func_get_args();
		for ($i = 0; $i < $numargs; $i++) {
			$libfile = "$args[$i].php";
			include_once "$app[path]/lib/$libfile";
		}
	}

	/***************************************************************************
	* Description : strtoupper
	***************************************************************************/
	public static function strtoupper($param)
	{
		$param = @explode(',', $param);
		while (list(, $var) = @each($param)):
			$cmd = "global \$$var;";
			eval($cmd);
			$cmd = "\$$var = trim(strtoupper(\$$var));";
			eval($cmd);
		endwhile;
	}

	/***************************************************************************
	* Description : set null value
	***************************************************************************/
	public static function set_null($param)
	{
		$param = @explode(',', $param);
		while (list(, $var) = @each($param)):
			$cmd = "global \$$var;";
			eval($cmd);
			$cmd = "\$testvar = trim(\$$var);";
			eval($cmd);
			if (strlen($testvar) == 0):
				$cmd = "\$$var = 'NULL';";
				eval($cmd);
			endif;
		endwhile;
	}

	/***************************************************************************
	* Description : serialize64
	***************************************************************************/
	public static function serialize64($var)
	{
		return base64_encode(serialize($var));
	}

	/***************************************************************************
	* Description : unserialize64
	***************************************************************************/
	public static function unserialize64($var)
	{
		return unserialize(base64_decode($var));
	}

	/***************************************************************************
	* Description : generate uid
	***************************************************************************/
	public static function generate_unique_id($table_name, $field_name, $length,$str='')
	{
		if($str==''):
			$str = " ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		endif;
		$lstr = $length;
		$luid = $length;
		while (TRUE):
			$id = "";
			for ($i = 0; $i < $luid; $i++):
				srand((double)microtime()*100000);
				$index = rand(1,$lstr);
				$id .= $str[$index];
			endfor;
			if (!db::lookup($field_name, $table_name, $field_name, $id)):
				break;
			endif;
		endwhile;
		return $id;
	}

	/***************************************************************************
	* Description : generate booking
	***************************************************************************/
	public static function generate_booking_id($table_name, $field_name, $length, $code="")
	{
		$str = " ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$lstr = 36;
		$luid = $length;
		while (TRUE):
			$id = $code;
			for ($i = 0; $i < $luid; $i++):
				srand((double)microtime()*100000);
				$index = rand(1,$lstr);
				$id .= $str[$index];
			endfor;
			$tgl = date("Y-m-d H:i:s", strtotime("-3 month"));
			if (!db::lookup($field_name, $table_name, "$field_name='$id' and post_date > '$tgl'")):
				break;
			endif;
		endwhile;
		return $id;
	}

	/***************************************************************************
	* Description : mysql date convert
	***************************************************************************/
	function to_mysql_date($date)
	{
		$d = explode('-', $date);
		return "$d[2]-$d[1]-$d[0]";
	}

	/***************************************************************************
	* Description : string helpers
	***************************************************************************/
	function set_default(&$var, $default = '')
	{
		if (!isset($var) || $var == ''):
			$var = $default;
		endif;
	}
	
	function nvl(&$var, $default = '')
	{
		return isset($var) ? $var : $default;
	}

	function ov(&$var) {
		return isset($var) ? htmlspecialchars(stripslashes($var)) : "";
	}

	function pv(&$var) {
		echo isset($var) ? htmlspecialchars(stripslashes($var)) : "";
	}

	function o($var) {
		return empty($var) ? "" : htmlspecialchars(stripslashes($var));
	}

	function p($var) {
		echo empty($var) ? "" : htmlspecialchars(stripslashes($var));
	}

	/***************************************************************************
	* Description : for debugging
	***************************************************************************/
	function debug($var, $exit = 0)
	{
		global $app;
		if ($app[debug]):
			echo "<pre>";
			print_r($var);
			echo "</pre>";
		endif;
		if ($exit):
			exit;
		endif;
	}

	/***************************************************************************
	* Description : set navigation bar
	***************************************************************************/
	function set_navigator(&$sql, &$nav, $pagesize, $param,$status=0)
	{
		global $app;
		if ($_GET['page_offset']):
			$pageoffset = $_GET['page_offset'];
		else:
			$pageoffset = 0;
		endif;
		if ($_GET['page_total']):
			$pagetotal = $_GET['page_total'];
		else:
			if($status==0):
				db::query($sql, $rs, $nr);
			else:
				db::query_akademik($sql, $rs, $nr);
			endif;
			$pagetotal = $nr;
		endif;
		$cari_limit = preg_match_all('|limit (.*)|sm',$sql,$hasil);
		if ($hasil[1][0]):
			$sql = str_replace("{$hasil[0][0]}","",$sql);
		endif;
		if($app[db][database]!="postgre"):
			if ($pageoffset+$pagesize>$pagetotal):
				$nilai = $pagetotal-$pageoffset;
				$sql = $sql . " limit $pageoffset, $nilai";
			else:
				$sql = $sql . " limit $pageoffset, $pagesize";
			endif;
		else:
			if ($pageoffset+$pagesize>$pagetotal):
				$nilai = $pagetotal-$pageoffset;
				$sql = $sql . " limit $nilai offset $pageoffset";
			else:
				$sql = $sql . " limit $pagesize offset $pageoffset";
			endif;
		endif;
		$nav = new nav;
		$nav->init($pageoffset, $pagetotal);
		$nav->param = $param;
		$nav->build($pagesize);
	}

	/***************************************************************************
	* Description : alphabet bar
	***************************************************************************/
	function alphabar($digit, $url, $key_var,$folder)
	{
		global $app;
		$url .= "&page.size=$_GET[page_size]";
		$cmd = "global \$$key_var;";
		eval($cmd);
		$cmd = "\$selkey = \$$key_var;";
		eval($cmd);
		$alpha = ($digit == "yes") ? "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ" : "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$l_alpha = strlen($alpha);
		$letter_found = FALSE;
		while($i<$l_alpha):
			if ($selkey == $alpha[$i]):
				$out .=  "<b>$alpha[$i]</b> ";
				$letter_found = TRUE;
			else:
				$out .=  "<a href='$url&$key_var=$alpha[$i]'>$alpha[$i]</a> ";
			endif;
			$i++;
		endwhile;
		if ($letter_found):
			$out .=  "<a href='$url&$key_var='>{$app[lang][txt][all]}</a> ";
		else:
			$out .=  "<b>{$app[lang][txt][all]}</b> ";
		endif;
		return "<table class='tablecontent_alphabar' style='font-size=6pt'><tr><td>$out</td></tr></table>";
	}

	/***************************************************************************
	* Description : helper function for delimited data
	* Notes : -
	***************************************************************************/
	function array_delimiter($op, $delimiter, $item, $data = '')
	{
		if ($op == 'add'):
			if (!is_array($item)):
				if (!trim($data)):
					return $delimiter . $item . $delimiter;
				else:
					if (ereg($delimiter . $item . $delimiter, $data)) return $data;
					return $data . $item . $delimiter;
				endif;
			else:
				return $delimiter . @implode($delimiter, $item) . $delimiter;
			endif;
		endif;
		if ($op == 'del'):
			$tmp = str_replace($item.$delimiter, '', $data);
			if (trim($tmp) == $delimiter):
				return '';
			else:
				return $tmp;
			endif;
		endif;
		if ($op == 'get'):
			$tmp1 = explode("$delimiter", $data);
			while (list(, $v) = each($tmp1)):
				if (!empty($v)):
					$tmp2[] = $v;
				endif;
			endwhile;
			return $tmp2;
		endif;
	}

	/***************************************************************************
	* Description : trim an array (remove empty)
	***************************************************************************/
	function trim_array(&$param)
	{
		while (list($k, $v) = @each($param)):
			if (!trim($v)):
				unset($param[$k]);
			endif;
		endwhile;
		reset($param);
	}

	/***************************************************************************
	* Description : check IE
	***************************************************************************/
    function is_ie()
    {
		global	$HTTP_USER_AGENT;
    	if (eregi("MSIE", $HTTP_USER_AGENT)):
            return true;
        else:
        	return false;
        endif;
    }

	/***************************************************************************
	* Description : date convert
	***************************************************************************/
	function format_date_base($date)
	{
		$d = explode('-', $date);
		return "$d[2]/$d[1]/$d[0]";
	}

	function timestamp_datetime($timestamp)
	{
		$dt[0] = substr($timestamp,0,4);
		$dt[1] = substr($timestamp,4,2);
		$dt[2] = substr($timestamp,6,2);
		$tm[0] = substr($timestamp,8,2);
		$tm[1] = substr($timestamp,10,2);
		$tm[2] = substr($timestamp,12,2);
		return (join($dt,"-") . " " . join($tm,":"));
	}
	
    /***************************************************************************
    * Description : format date
    * Parameters : $date (YYYY-MM-DD)
	*			   $country : eng, ina
	*			   $format : use built in PHP date format
	*			   $long : Y, N (long format)
    ***************************************************************************/
    public static function format_date($date, $country, $long = 'N')
    {
        if (!$date || $date == '0000-00-00'):
			$out = '-';
		else:
			if ($country == 'ina'):
				if ($long == 'N'):
					$format = "d F Y";
				else:
					$format = "l, d F Y";
				endif;
			else:
				if ($long == 'N'):
					$format = "F d, Y";
				else:
					$format = "l, d F Y";
				endif;
			endif;
			$out = date($format, strtotime($date));
			if ($country == 'ina'):
				$eng = array("/January/", "/February/", "/March/", "/April/", "/May/", "/June/", "/July/", "/August/", "/September/", "/October/", "/November/", "/December/");
				$ina = array("Januari", "Pebruari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
				$out = preg_replace($eng, $ina, $out);
				if ($long != 'N'):
					$eng = array("/Monday/", "/Tuesday/", "/Wednesday/", "/Thursday/", "/Friday/", "/Saturday/", "/Sunday/");
					$ina = array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at","Sabtu", "Minggu");
					$out = preg_replace($eng, $ina, $out);
				endif;
			endif;
		endif;
		return $out;
    }

    /***************************************************************************
    * Description : format date abbreviation
    * Parameters : $date (YYYY-MM-DD)
	*			   $country : eng, ina
	*			   $format : use built in PHP date format
	*			   $long : Y, N (long format)
    ***************************************************************************/
    public static function format_date_abb($date, $country, $long = 'N')
    {
        if (!$date || $date == '0000-00-00'):
			$out = '-';
		else:
			if ($country == 'ina'):
				if ($long == 'N'):
					$format = "d M Y";
				elseif ($long == 'A'):
					$format = "d M y";
				else:
					$format = "l, d M Y";
				endif;
			else:
				if ($long == 'N'):
					$format = "M d, Y";
				elseif ($long == 'A'):
					$format = "d M y";
				else:
					$format = "l, d M Y";
				endif;
			endif;
			$out = date($format, strtotime($date));
			if ($country == 'ina'):
				$eng = array("/Jan/", "/Feb/", "/Mar/", "/Apr/", "/May/", "/Jun/", "/Jul/", "/Aug/", "/Sep/", "/October/", "/Nov/", "/Dec/");
				$ina = array("Jan", "Peb", "Mar", "Apr", "Mei","Jun", "Jul", "Agt", "Sep", "Okt", "Nop", "Des");
				$out = preg_replace($eng, $ina, $out);
				if ($long != 'N'):
					$eng = array("/Mon/", "/Tue/", "/Wed/", "/Thu/", "/Fri/", "/Sat/", "/Sun/");
					$ina = array("Sen", "Sel", "Rab", "Kam", "Jum","Sab", "Ming");
					$out = preg_replace($eng, $ina, $out);
				endif;
			endif;
		endif;
		return $out;
    }


    /***************************************************************************
    * Description : format datetime
    * Parameters : $date (YYYY-MM-DD HH:MM:SS)
	*			   $country : eng, ina
	*			   $format : use built in PHP date format
	*			   $long : Y, N (long format)
    ***************************************************************************/
    function format_datetime($date, $country, $long = 'N')
    {
		if (!$date || $date == '0000-00-00 00:00:00'):
			$out = '-';
		else:
			if ($country == 'ina'):
				if ($long == 'N'):
					$format = "d F Y H:i:s";
				else:
					$format = "l, d F Y H:i:s";
				endif;
			else:
				if ($long == 'N'):
					$format = "F d, Y H:i:s";
				else:
					$format = "l, d F Y H:i:s";
				endif;
			endif;
			$out = date($format, strtotime($date));
			if ($country == 'ina'):
				$eng = array("/January/", "/February/", "/March/", "/April/", "/May/", "/June/", "/July/", "/August/", "/September/", "/October/", "/November/", "/December/");
				$ina = array("Januari", "Pebruari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
				$out = preg_replace($eng, $ina, $out);
				if ($long != 'N'):
					$eng = array("/Monday/", "/Tuesday/", "/Wednesday/", "/Thursday/", "/Friday/", "/Saturday/", "/Sunday/");
					$ina = array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at","Sabtu", "Minggu");
					$out = preg_replace($eng, $ina, $out);
				endif;
			endif;
		endif;
		return $out;
    }

    /***************************************************************************
    * Description : format datetime abbreviation
    * Parameters : $date (YYYY-MM-DD HH:MM:SS)
	*			   $country : eng, ina
	*			   $format : use built in PHP date format
	*			   $long : Y, N (long format)
    ***************************************************************************/
    function format_datetime_abb($date, $country, $long = 'N')
    {
		if (!$date || $date == '0000-00-00 00:00:00'):
			$out = '-';
		else:
			if ($country == 'ina'):
				if ($long == 'N'):
					$format = "d M Y H:i:s";
				else:
					$format = "l, d M Y H:i:s";
				endif;
			else:
				if ($long == 'N'):
					$format = "M d, Y H:i:s";
				else:
					$format = "l, d M Y H:i:s";
				endif;
			endif;
			$out = date($format, strtotime($date));
			if ($country == 'ina'):
				$eng = array("/Jan/", "/Feb/", "/Mar/", "/Apr/", "/May/", "/Jun/", "/Jul/", "/Aug/", "/Sep/", "/October/", "/Nov/", "/Dec/");
				$ina = array("Jan", "Peb", "Mar", "Apr", "Mei","Jun", "Jul", "Agt", "Sep", "Okt", "Nop", "Des");
				$out = preg_replace($eng, $ina, $out);
				if ($long != 'N'):
					$eng = array("/Mon/", "/Tue/", "/Wed/", "/Thu/", "/Fri/", "/Sat/", "/Sun/");
					$ina = array("Sen", "Sel", "Rab", "Kam", "Jum","Sab", "Ming");
					$out = preg_replace($eng, $ina, $out);
				endif;
			endif;
		endif;
		return $out;
    }
	function format_datetime_abbnosec($date, $country, $long = 'N')
    {
		if (!$date || $date == '0000-00-00 00:00:00'):
			$out = '-';
		else:
			if ($country == 'ina'):
				if ($long == 'N'):
					$format = "d M Y H:i";
				else:
					$format = "l, d M Y H:i";
				endif;
			else:
				if ($long == 'N'):
					$format = "M d, Y H:i";
				else:
					$format = "l, d M Y H:i";
				endif;
			endif;
			$out = date($format, strtotime($date));
			if ($country == 'ina'):
				$eng = array("/Jan/", "/Feb/", "/Mar/", "/Apr/", "/May/", "/Jun/", "/Jul/", "/Aug/", "/Sep/", "/October/", "/Nov/", "/Dec/");
				$ina = array("Jan", "Peb", "Mar", "Apr", "Mei","Jun", "Jul", "Agt", "Sep", "Okt", "Nop", "Des");
				$out = preg_replace($eng, $ina, $out);
				if ($long != 'N'):
					$eng = array("/Mon/", "/Tue/", "/Wed/", "/Thu/", "/Fri/", "/Sat/", "/Sun/");
					$ina = array("Sen", "Sel", "Rab", "Kam", "Jum","Sab", "Ming");
					$out = preg_replace($eng, $ina, $out);
				endif;
			endif;
		endif;
		return $out;
    }

    /***************************************************************************
    * Description : partstr
    * Parameters : $str : string
	*			   $length : length
    ***************************************************************************/
    function partstr($str, $length)
	{
		return (strlen($str)>$length) ? substr($str, 0, $length)."..." : $str;
	}

	/***************************************************************************
    * Description : mq_encode
    * Parameters : $param : var
    ***************************************************************************/
    function mq_encode($param)
	{
		if (!get_magic_quotes_gpc()):
			$fields = "\$".str_replace(",", ",\$", $param);
			eval("global $fields;");
			$arr = explode(",", $fields);
            while (list($k, $v) = each($arr)):
                eval("$v = addslashes($v);");
            endwhile;
		endif;
	}

	public static function generate_password ($length = 8, $valid_chars = "")
	{
		if($valid_chars=="") {
		$valid_chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		}
		$password="";
		while($length>0) {
			$password.= $valid_chars[rand(0,strlen($valid_chars)-1)];
			$length--;
		}
		return $password;
	}
        
        public static function status_validasi ($status)
	{
		if($status==1) {
                    $label_status = "<span class=\"label label-warning\">Pengajuan</span>";
		}elseif($status==2) {
                    $label_status = "<span class=\"label label-danger\">Diproses</span>";
                }elseif($status==3) {
                    $label_status = "<span class=\"label label-success\">Diproses</span>";
                }
		return $label_status;
	}
	
	function generate_image_validator(){
		global $app;
		// Create an image where width=200 pixels and height=40 pixels
		$val_img = imagecreate(155, 35);
		// Allocate 2 colors to the image
		$white = imagecolorallocate($val_img, 46,60,31);
		$black = imagecolorallocate($val_img, 238,239,239);
		// Create a seed to generate a random number
		srand((double)microtime()*1000000);
		// Run the random number seed through the MD5 function
		$seed_string = md5(rand(0,9999));
		// Chop the random string down to 5 characters
		// This is the validation code we will use
		$val_string = substr($seed_string, 17, 5);
		// Set the background of the image to black
		imagefill($val_img, 0, 0, $black);
		// Print the validation code on the image in white
		imagestring($val_img, 4, 75, 10, $val_string, $white);
		// Write the image file to the current directory
		imagejpeg($val_img, "verify.jpg");
		imagedestroy($val_img);
		$app[val_string]=$val_string;
		return;
	}
	/***************************************************************************
	* Description : load lib
	***************************************************************************/
	function load_email()
	{
		global $app;
		$sql = "select * from {$app[table][email_address]}";
		db::query($sql, $rs['address'], $nr['address']);
		echo mysql_error();
		while ($address = db::fetch($rs['address'])) {
			$app[$address['name']]['recipient'] = $address['email'];
		}
		return;
	}

	function format_ribuan($nilai, $separator)
	{
		global $app;
		$result = "";
		$hasil = "";
		$j=0;
		// iterate through arguments
		for ($i=strlen($nilai); $i>=0; $i--) {
		$j++;
			if (($j%3)==1 && ($j>1) && ($i!=0)) {
				$result .= $nilai[$i].$separator;
			}
			else
			{
				$result .= $nilai[$i];
			}
		}
		for ($i=strlen($result); $i>=0; $i--) {
			$hasil .= $result[$i];
		}
		return $hasil;
	}

	/***************************************************************************
	* Description : load cfg
	***************************************************************************/
	function load_cfg()
	{
		global $app;
		$sql = "select * from {$app[table][config]}";
		db::query_akademik($sql, $rs['config'], $nr['config']);
		//echo mysql_error();
		while ($cfg = db::fetch($rs['config'])) {
			$app[$cfg['variable']] = $cfg['value'];
		}
		//if($app[me][fak_kd]=="21" && ($app[me][mhs_tahun]=='2010' || $app[mhs_tahun]=='2011')):
		/*if($app[me][pro_kd]=='03315' && $app[me][mhs_tahun]=='2010' && $app[me][kelas]=='C'):
			$app[thaka_skr]="20112";
			$app[thaka_sblm]="20111";
			$app[thaka_jadwal]="20112";
			$app[tahunakademik]="2011/2012-Genap";
			 $app[thaka_skr_reg]="20112";
		endif;*/
		//print_r($app);
		/*if($app[me][mhs_nim]=='100431507621'):
			$app[thaka_skr]=$app[thaka_skr_pasca];
			$app[thaka_jadwal]=$app[thaka_jadwal_pasca];
		endif;*/
		$thakalanjut=substr($app['thaka_skr'],0,4)+1;
		$thakasblm=substr($app['thaka_sblm'],0,4)+1;
		$app['thnakademik']=substr($app['thaka_skr'],0,4)."/".$thakalanjut;
		$app['thnakademiksblm']=substr($app['thaka_sblm'],0,4)."/".$thakasblm;
		return;
	}

	function savelog($query) {
		if (mysql_error()):
			$query = addslashes($query);
			$sql = "insert into {$app[me][error_log]}
					(tanggal, username, sql) values
					(now(), '{$app[me][name]}', '$query')";
			db::qry($sql);
			echo "Error $query";
		endif;
	}

	
   function getRealIpAddr()
	{
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
    	  return $ip;
   }
   public static function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
}

?>
