<?

/*******************************************************************************
* Filename : form.php
* Description : form library
*******************************************************************************/

class form
{
    /***************************************************************************
    * Description : init
    ***************************************************************************/
	function init() 
	{
		global $error;
		form::set_error(0);
		if (!$error):
			form::reset();
		endif;
	}

    /***************************************************************************
    * Description : is error
    ***************************************************************************/
	function is_error() 
	{
		if ($_SESSION['error_flag']):
			return TRUE;
		endif;
		return FALSE;
	}

    /***************************************************************************
    * Description : set_error
    ***************************************************************************/
	function set_error($flag)
	{
		$_SESSION['error_flag'] = $flag;
	}
/****************************************************************************
    * Description : set error form
    * Parameters : $frm
    ***************************************************************************/
    function set_error_frm($frm='')
    {
	    $_SESSION['frm_error'][] = $frm;
    }
    /***************************************************************************
    * Description : reset
    ***************************************************************************/
	function reset()
	{
		$_SESSION['error_flag'] = 0;
		$_SESSION['form_value'] = '';
		$_SESSION['error_msg'] = array();
	}

    /***************************************************************************
    * Description : bundle form value
    ***************************************************************************/
    function serialize_form()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'):
            $_SESSION['form_value'] = app::serialize64($_GET);
        else:
            $_SESSION['form_value'] = app::serialize64($_POST);
        endif;
    }

    /***************************************************************************
    * Description : unbundle form value
    ***************************************************************************/
    function unserialize_form()
    {
        $frm = unserialize64($_SESSION['form_value']);
        return $frm;
    }

    /***************************************************************************
    * Description : populate form
    ***************************************************************************/
    function populate(&$form)
    {
		global $error;
		if (form::is_error() || $error):
        	$frm = form::get_value();
			while (list($k, $v) = @each($frm)):
				if (in_array($k , array('act', 'step', 'referer'))):
					$field = $k;
				else:
					$field = substr($k, 2);
				endif;
				$form[$field] = $v;
			endwhile;
		endif;
    }

    /***************************************************************************
    * Description : get value
    ***************************************************************************/
    function get_value()
    {
        return app::unserialize64($_SESSION['form_value']);
    }

    /***************************************************************************
    * Description : validate form
    ***************************************************************************/
    function validate($type, $fields, $param = '')
    {
        global $app;
        $fields = "\$".str_replace(",", ",\$", $fields);
        @eval("global $fields;");
        $arr = @explode(",", $fields);
        if ($type == ''):
            while (list($k, $v) = @each($arr)):
                $field = substr($v, 3);
                $cmd = "\$v = $v;";
                @eval($cmd);
                if (!trim($v)):
					msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['empty']}");
                    $_SESSION['error_flag'] = 1;
                endif;
            endwhile;
        endif;
        if ($type == 'checkbox'):
            while (list($k, $v) = @each($arr)):
                $field = substr($v, 3);
                $cmd = "\$v = $v;";
                eval($cmd);
                if (!@count($v)):
					msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['checkbox']}");
                    $_SESSION['error_flag'] = 1;
                endif;
            endwhile;
		endif;
        if ($type == 'select'):
			while (list($k, $v) = @each($arr)):
                $field = substr($v, 3);
				eval("\$v = $v;");
				if (!trim($v)):
					msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['select']}");
                    $_SESSION['error_flag'] = 1;
				endif;
			endwhile;
        endif;
        if ($type == 'email'):
			while (list($k, $v) = @each($arr)):
                $field = substr($v, 3);
				eval("\$v = $v;");
				if (!ereg("^(.+)@(.+)\\.(.+)$", $v)):
					msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['email']}");
                    $_SESSION['error_flag'] = 1;
				endif;
			endwhile;
        endif;
        if ($type == 'date'):
			while (list($k, $v) = @each($arr)):
                $field = substr($v, 3);
				eval("\$v = $v;");
				list($year, $month, $date) = explode('-', $v);
				if (!@checkdate($month, $date, $year)):
					msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['date']}");
                    $_SESSION['error_flag'] = 1;
				endif;
			endwhile;
        endif;
        if ($type == 'image'):
			while (list($k, $v) = @each($arr)):
                $field = substr($v, 3);
				$var = substr($v, 1);
				eval("\$v = $v;");
				list($file_max_size, $min_width, $max_width, $min_height, $max_height) = explode('|', $param);
				$file['tmp_name'] = $_FILES[$var]['tmp_name'];
				$file['name'] = $_FILES[$var]['name'];
				$file['size'] = $_FILES[$var]['size'];

				if ($file['size'] > 0):
					$pict = getimagesize($file['tmp_name']);
					//print_r($pict);//exit;
					if (!(($pict[2] == 1) || ($pict[2] == 2) || ($pict[2] == 13))):
						$error = 'ERR_TYPE';
						if ($error):
							msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['image.'.$error]}");
							$_SESSION['error_flag'] = 1;
						endif;
					endif;
					if (($pict[0] < $min_width) || ($pict[0] > $max_width) || ($pict[1] < $min_height) || ($pict[1] > $max_height)):
						$error = 'ERR_WIDTH';
						if ($error):
							msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['image.'.$error]}");
							$_SESSION['error_flag'] = 1;
						endif;
					endif;
					if ($file[size] > ($file_max_size * 1024)):
						$error = 'ERR_SIZE';
						if ($error):
							msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['image.'.$error]}");
							$_SESSION['error_flag'] = 1;
						endif;
					endif;
				endif;
			endwhile;
        endif;
		if ($type == 'file'):
			while (list($k, $v) = @each($arr)):
                $field = substr($v, 3);
				$var = substr($v, 1);
				@eval("\$v = $v;");

				list($file_max_size) = @explode('|', $param);

				$file['tmp_name'] = $_FILES[$var]['tmp_name'];
				$file['name'] = $_FILES[$var]['name'];
				$file['size'] = $_FILES[$var]['size'];
				//print $file[size];
				if ($file['size'] > 0):
					$pict = getimagesize($file['tmp_name']);
					if ($file['size'] > ($file_max_size * 1024)):
						$error = 'ERR_SIZE';
						if ($error):
							msg::set_msg("{$app['lang']['error']['file.'.$error]}");
							$_SESSION['error_flag'] = 1;
						endif;
					endif;
				else:
					$error = 'ERR_SIZE_2';
					if ($error):
						msg::set_msg("{$app['lang']['error']['file.'.$error]}");
						$_SESSION['error_flag'] = 1;
					endif;
				endif;
			endwhile;
        endif;
		if ($type == 'numeric'):
			while (list($k, $v) = @each($arr)):
                $field = substr($v, 3);
				eval("\$v = $v;");
				if (!preg_match ("/^([0-9]+)$/", $v)):
					msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['numeric']}");
                    $_SESSION['error_flag'] = 1;
				endif;
			endwhile;
        endif;
    }

	function validate_count_char($fields, $length)
    {
        global $app;
        $fields = "\$".str_replace(",", ",\$", $fields);
        eval("global $fields;");
        $arr = explode(",", $fields);
        while (list($k, $v) = each($arr)):
			$field = substr($v, 3);
			$cmd = "\$v = $v;";
			eval($cmd);
			$char = strlen($v);
			//$char = count_chars($v);
			if ($char > $length):
				msg::set_msg("{$app['lang']['field'][$field]} {$app['lang']['error']['char']} Your $field : $char characters." );
				$_SESSION['error_flag'] = 1;
			endif;
       endwhile;
	}
	  function validate_krs_proses(){
	 	global $app;
        $sql="select now() as wkt";
        db::query($sql,$rs['wkt'],$nr['wkt']);
        $wkt=db::fetch($rs['wkt']);
		$cekmhs=db::get_record("buka_krs_mhs","mhs_nim='{$app[me][mhs_unix]}' and thaka='$app[thaka_skr]'");
		if($cekmhs['mhs_nim']):
			$app['wkt_krs_tutup']=$cekmhs['wkt_akhir'];
		endif;
	   /* if($app[me][fak_kd]=="21"):
            $app[wkt_krs_tutup]="2015-08-14 23:59:00";
	    endif;*/
        //$app['wkt_krs_tutup']="2016-01-06 23:59:00";
        //$app['wkt_krs_buka']="2016-01-07 12:00:00";
		$skr=strtotime($wkt['wkt'])/86400;
		$tgl_awal=strtotime($app['wkt_krs_buka'])/86400;
		$tgl_akhir=strtotime($app['wkt_krs_tutup'])/86400;
		if($skr <= $tgl_akhir && $skr >= $tgl_awal){
			$app['status_buka']=1;
		}if($skr < $tgl_awal){
			$app['status_buka']=2;
        }else{
			$app['status_buka']=1;
		};
	}

    function validate_kuiz_active(){
	 	global $app;
		/*if(($app[me][pro_kd]=='07215' || $app[me][pro_kd]=='04315' || $app[me][pro_kd]=='03115') && $app[me][mhs_tahun]=='2011'):
		 //if($app[me][pro_kd]=='05516' && $app[me][mhs_tahun]=='2011' && $app[me][kelas]=='A'):
                //        $app[wkt_krs_tutup]="2012-01-31 23:00:00";
                //endif;

                        $app[wkt_kuiz_tutup]="2012-01-29 23:59:00";
                endif;*/
         	/*if($app[me][fak_kd]=="21"):
                        $app[wkt_kuiz_tutup]="2014-09-07 23:59:00";
	        endif;*/
		$skr=strtotime(date("Y-m-d H:i:s"))/86400;
		$wkt_awal=strtotime($app['wkt_kuiz_buka'])/86400;
		$wkt_akhir=strtotime($app['wkt_kuiz_tutup'])/86400;
		if($skr >= $wkt_awal && $skr <= $wkt_akhir):
			$app['status_buka_kuiz']=1;
		else:
			$app['status_buka_kuiz']=0;
		endif;
		//print_r($app);
	 }
     function cek_time(){
        global $app;
        $sql="select now() as wkt";
        db::query($sql,$rs['wkt'],$nr['wkt']);
        $wkt=db::fetch($rs['wkt']);
        $app['wkt_skr_db']=$wkt['wkt'];

     }

}

?>
