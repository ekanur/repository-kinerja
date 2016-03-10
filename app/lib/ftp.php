<?

/*******************************************************************************
* Filename : ftp.php
* Description : ftp library
*******************************************************************************/

class ftp
{

	function connect(){
		global $app;
		$app[conn_id] = ftp_connect($app[ftp_server]) or die("Couldn't connect to $ftp_server"); 
		$login_result =@ftp_login($app[conn_id], $app[ftp_user_name], $app[ftp_user_pass]);
		if(!$login_result):
			return FALSE;
		endif;
		return TRUE;
	} 
}

?>