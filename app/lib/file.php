<?

/*******************************************************************************
* Filename : file.php
* Description : file library
*******************************************************************************/

class file
{

	/***************************************************************************
	* Description : save picture to server
	* Notes : $filename = field of file
	*         $folder = folder position where file saved
	*         $prefix = 
	***************************************************************************/
	function save_picture($filename, $folder, $prefix = '')
	{
		global $app;
		$field = substr($filename, 2);
		$new_name = $prefix . strtoupper(md5(uniqid(rand(), true))) . substr($_FILES[$filename][name], -4, 4);
		if (!@copy($_FILES[$filename][tmp_name], $folder.'/'. $new_name)):
			libadm::display_msg($app[lang][error]['title'], "{$app[lang][field][$field]} {$app[lang][error]['ERR_COPY']}");
			print $app[lang][error]['ERR_COPY'];
		endif;    
		return $new_name;
	}
	
	function save_picture_root($filename, $folder, $prefix = '')
	{
		global $app;
		$field = substr($filename, 2);
		$new_name = $prefix . strtoupper(md5(uniqid(rand(), true))) . substr($_FILES[$filename][name], -4, 4);
		if (!@copy($_FILES[$filename][tmp_name], $folder.'/'. $new_name)):
			libroot::display_msg($app[lang][error]['title'], "{$app[lang][field][$field]} {$app[lang][error]['ERR_COPY']}");
			//print $app[lang][error]['ERR_COPY'];
		endif;    
		return $new_name;
	}
	/***************************************************************************
	* Description : save file to server
	* Notes : $filename = temporary file on server / file handle
	*         $folder = folder position where file saved
	*         $prefix = 
	***************************************************************************/
	function save_file($filename, $folder, $prefix = '')
	{
		global $app;
		$field = substr($filename, 2);		
		$new_name = $prefix.substr($_FILES[$filename]['name'], -4, 4);
		if (!@copy($_FILES[$filename]['tmp_name'], $folder.'/'. $new_name)):
			$new_name="uploadgagal";
			exit;
		endif;
		return $new_name;
	}
	function format_size($size)
	{		
		if ($size >= 1073741824):
			$size = round($size / 1073741824 * 100) / 100 . " Gb";
		elseif ($size >= 1048576):
			$size = round($size / 1048576 * 100) / 100 . " Mb";
		elseif ($size >= 1024):
			$size = round($size / 1024 * 100) / 100 . " Kb";
		elseif ($size > 0):
			$size = $size . " byte";
		else:
			$size="-";
		endif;
		return $size;
	}

	function save_as_file($file, $file_name, $folder)
    {
        global $app;
		$field = substr($file, 2);
        $name_file = $file_name;
		if (!@copy($_FILES[$file][tmp_name], $folder.'/'. $name_file)):
			libadm::display_msg($app[lang][error]['title'], "{$app[lang][field][$field]} {$app[lang][error]['ERR_COPY']}");
		endif;
        return $name_file;
    }

	function save_as_file_array($file, $i, $file_name, $folder)
    {
        global $app;
		$field = substr($file, 2);
        $name_file = $file_name;
		if (!@copy($_FILES[$file][tmp_name][$i], $folder.'/'. $name_file)):
			libadm::display_msg($app[lang][error]['title'], "{$app[lang][field][$field]} {$app[lang][error]['ERR_COPY']}");
		endif;
        return $name_file;
    }

	function getFile($filename)
	{
		$return = '';
		if ($fp = fopen($filename, 'rb')) {
			while (!feof($fp)) {
				$return .= fread($fp, 1024);
			}
			fclose($fp);
			return $return;
		} else {
			return false;
		}
	}

}

?>
