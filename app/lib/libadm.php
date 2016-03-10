<?

/*******************************************************************************
* Filename : libadm.php
* Description : admin library
*******************************************************************************/

class libadm
{
    function display_block_header($title,$display='',$model = '')
	{
	    global $app;
		$theme = ($app[me][theme]) ? $app[me][theme] : "default";
		/*$theme="metal_blue";*/
		if (!$model):
			$user = app::unserialize64($_SESSION[adminsession]);
			include "$app[path]/style/blk_header.php";
		else:
			include "$app[path]/style/blk_header_".$model.".php";
		endif;
	}

	function display_block_footer($status='',$model = '')
	{
	    global $app, $nav;
		if($status):
			$shw_tab=true;
		endif;
		if (!$model):
			include "$app[path]/style/blk_footer.php";
		else:
			include "$app[path]/style/blk_footer_".$model.".php";
		endif;
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
		if (!strlen($_SESSION[adminsession])):
			libadm::display_msg($app[lang][error]['title'], $app[lang][error]['adm_not_login']);
		endif;
		$app[me] = app::unserialize64($_SESSION[adminsession]);
		$app[login_as] = "admin";
		if ($application):
			$applications = explode(',', $application);
			$admin = $app[me];
			$ok = FALSE;
			while (list(, $v) = @each($applications)):
				if (ereg($v, $admin[application]) && !ereg($v.'_0', $admin[application])):
					$ok = TRUE;
				endif;
			endwhile;
			if (!$ok):
				libadm::display_msg($app[lang][error]['title'], $app[lang][error]['adm_no_permission']);
			endif;
		endif;

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
    * Description : get parent in product
    * Parameters : id
    ***************************************************************************/
	function get_top_parent($id, &$parent)
	{
		global $app;
		$data = db::get_record('product_parent', 'id', $id);
		$parent[] = $data[name];		
		if ($data[parent_id]!=0):
			 libadm::get_top_parent($data[parent_id],$parent);
		else:
			$parent = array_reverse($parent);
			$parent = implode(" => ", $parent);
		endif;
		return $parent;
	}

	function get_bottom_parent($id, &$child)
	{
		global $app;
		$dat = db::get_recordset('product_parent', 'parent_id', $id);
		while ($record = db::fetch($dat)):
			$child[] = $record[id];
		endwhile;
		while (list($k, $v) = @each($child)):
			libadm::get_bottom_parent($v, $child);
		endwhile;
		return $child;
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

	function get_theme()
	{
		$user = app::unserialize64($_SESSION[adminsession]);
		if ($user[theme]):
			$theme = $user[theme];
		else:
			$theme = "blue";
		endif;
		return $theme;
	}
}

?>