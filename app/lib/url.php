<?

/*******************************************************************************
* Filename : url.php
* Description : url libary
*******************************************************************************/

class url
{
    function get_referer()
    {
        global $referer;
        if ($referer):
            $referer = ereg_replace ("&referer(.*)", "", $referer);
            if (!ereg("\?", $referer)):
                $referer .= "?";
            endif;
            return $referer;
        else:
            return $_SERVER[HTTP_REFERER];
        endif;

    }
	
	function strip_querystring($url) 
	{
		if ($commapos = strpos($url, '?')):
			return substr($url, 0, $commapos);
		else:
			return $url;
		endif;
	}

	function get_short_referer() 
	{
		return url::strip_querystring($_SERVER['HTTP_REFERER']);
	}

	function me() 
	{
		if (getenv("REQUEST_URI")): 
			$me = getenv("REQUEST_URI");
		elseif (getenv("PATH_INFO")):
			$me = getenv("PATH_INFO");

		elseif ($GLOBALS["PHP_SELF"]):
			$me = $GLOBALS["PHP_SELF"];
		endif;
		return url::strip_querystring($me);
	}
	
	function complete_me() {
		if (getenv("REQUEST_URI")) {
			$me = getenv("REQUEST_URI");

		} elseif (getenv("PATH_INFO")) {
			$me = getenv("PATH_INFO");

		} elseif ($GLOBALS["PHP_SELF"]) {
			$me = $GLOBALS["PHP_SELF"];
		}
		return $me;
	}

	function navigator_url($field, $title, $color = "#bd3f09") 
	{
		global $app;
		$url = url::complete_me();
		if (ereg('webmin', $url)):
			$path_ext = "webmin/";
		elseif (ereg('agent', $url)):
			$path_ext = "webmin/";
		elseif (ereg('handling', $url)):
			$path_ext = "webmin/";
		endif;
		if (!ereg('\?', $url)):
			$url .= "?";
		endif;
		$url = preg_replace("|offset=.*?&|", "offset=0&", $url);
		$url = str_replace('&sort=asc', '', $url);
		$url = str_replace('&sort=desc', '', $url);
		$url = str_replace("&order=$field", '', $url);
		$var = $_GET;
		if ($var['order'] == $field):
			if ($var['sort'] == 'asc'):
			$out = "<a href='$url&order=$field&sort=desc'><b><font color=$color>$title</font></b></a> <img src='$app[www]/style/img/icons/arrow_down_mini.gif'>";
			else:
				$out = "<a href='$url&order=$field&sort=asc'><b><font color=$color>$title</font></b></a> <img src='$app[www]/style//img/icons/arrow_down_mini.gif'>";
			endif;
		else:
			$out = "<a href='$url&order=$field&sort=asc'><b><font color=$color>$title</font></b></a>";
		endif;
		return $out;
	}

}

?>