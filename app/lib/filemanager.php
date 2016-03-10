<?

/*******************************************************************************
* Filename : filemanager.php
* Description : filemanager appul
* Last appified : 08 Jan 2003
*******************************************************************************/

class filemanager
{
    function enlever_controlM($filename)
	{
	$fic=file($filename);
	$fp=fopen($filename,"w");
	while (list ($cle, $val) = each ($fic)) 
		{
		$val=str_replace(CHR(10),"",$val);
		$val=str_replace(CHR(13),"",$val);
		fputs($fp,"$val\n");
		}
	fclose($fp);
	}

	function txt_vers_html($kalimat)
		{
		$kalimat=str_replace("&#8216;","'",$kalimat);
		$kalimat=str_replace("&#339;","oe",$kalimat);
		$kalimat=str_replace("&#8217;","'",$kalimat);
		$kalimat=str_replace("&#8230;","...",$kalimat);
		$kalimat=str_replace("&","&amp;",$kalimat);
		$kalimat=str_replace("<","&lt;",$kalimat);
		$kalimat=str_replace(">","&gt;",$kalimat);
		$kalimat=str_replace("\"","&quot;",$kalimat);
		$kalimat=str_replace("à","&agrave;",$kalimat);
		$kalimat=str_replace("é","&eacute;",$kalimat);
		$kalimat=str_replace("è","&egrave;",$kalimat);
		$kalimat=str_replace("ù","&ugrave;",$kalimat);
		$kalimat=str_replace("â","&acirc;",$kalimat);
		$kalimat=str_replace("ê","&ecirc;",$kalimat);
		$kalimat=str_replace("î","&icirc;",$kalimat);
		$kalimat=str_replace("ô","&ocirc;",$kalimat);
		$kalimat=str_replace("û","&ucirc;",$kalimat);
		$kalimat=str_replace("ä","&auml;",$kalimat);
		$kalimat=str_replace("ë","&euml;",$kalimat);
		$kalimat=str_replace("ï","&iuml;",$kalimat);
		$kalimat=str_replace("ö","&ouml;",$kalimat);
		$kalimat=str_replace("ü","&uuml;",$kalimat);
		return $kalimat;
		}
	
	function save_as_file($file, $file_name, $folder)
	{
	$name_file = $file_name;
	copy($file,$folder."/".$name_file);
	return $name_file;
	}
	
	function is_editable($filename)
		{
		$retour=0;
		if(eregi("\.txt$|\.sql$|\.php$|\.php3$|\.phtml$|\.htm$|\.html$|\.cgi$|\.pl$|\.js$|\.css$|\.inc$",$filename)) {$retour=1;}
		return $retour;
		}
	
	function is_image($filename)
		{
		$retour=0;
		if(eregi("\.png$|\.bmp$|\.jpg$|\.jpeg$|\.gif$",$filename)) {$retour=1;}
		return $retour;
		}
	
	function format_size($size)
		{		
		if ($size >= 1073741824) {$size = round($size / 1073741824 * 100) / 100 . " Gb";}
		elseif ($size >= 1048576) {$size = round($size / 1048576 * 100) / 100 . " Mb";}
		elseif ($size >= 1024) {$size = round($size / 1024 * 100) / 100 . " Kb";}
		else {$size = $size . " byte";} 
		if($size==0) {$size="-";}
		return $size;
		}
	
	function size($filename)
		{	
		$size=filesize($filename);
		if ($size >= 1073741824) {$size = round($size / 1073741824 * 100) / 100 . " Gb";}
		elseif ($size >= 1048576) {$size = round($size / 1048576 * 100) / 100 . " Mb";}
		elseif ($size >= 1024) {$size = round($size / 1024 * 100) / 100 . " Kb";}
		else {$size = $size . " byte";} 
		if($size==0) {$size="-";}
		return $size;
		}
	
	function date_modif($filename)
		{
		$tmp = filemtime($filename);
		return date("d/m/Y H:i",$tmp);
		}
	
	function mimetype($filename,$quoi)
		{
		global $app,$lang;	
		if(is_dir($filename)){$image="{$app[www]}/img/file_manager/dossier.gif";$nom_type=$lang[app][filemanager][mess][8];}
		else if(eregi("\.mid$",$filename)){$image="{$app[www]}/img/file_manager/mid.gif";$nom_type=$lang[app][filemanager][mess][9];}
		else if(eregi("\.txt$",$filename)){$image="{$app[www]}/img/file_manager/txt.gif";$nom_type=$lang[app][filemanager][mess][10];}
		else if(eregi("\.sql$",$filename)){$image="{$app[www]}/img//file_manager/txt.gif";$nom_type=$lang[app][filemanager][mess][10];}
		else if(eregi("\.js$",$filename)){$image="{$app[www]}/img/file_manager/js.gif";$nom_type=$lang[app][filemanager][mess][11];}
		else if(eregi("\.gif$",$filename)){$image="{$app[www]}/img/file_manager/gif.gif";$nom_type=$lang[app][filemanager][mess][12];}
		else if(eregi("\.jpg$",$filename)){$image="{$app[www]}/img/file_manager/jpg.gif";$nom_type=$lang[app][filemanager][mess][13];}
		else if(eregi("\.html$",$filename)){$image="{$app[www]}/img/file_manager/html.gif";$nom_type=$lang[app][filemanager][mess][14];}
		else if(eregi("\.htm$",$filename)){$image="{$app[www]}/img/file_manager/html.gif";$nom_type=$lang[app][filemanager][mess][15];}
		else if(eregi("\.rar$",$filename)){$image="{$app[www]}/img/file_manager/rar.gif";$nom_type=$lang[app][filemanager][mess][60];}
		else if(eregi("\.gz$",$filename)){$image="{$app[www]}/img/file_manager/zip.gif";$nom_type=$lang[app][filemanager][mess][61];}
		else if(eregi("\.tgz$",$filename)){$image="{$app[www]}/img/file_manager/zip.gif";$nom_type=$lang[app][filemanager][mess][61];}
		else if(eregi("\.z$",$filename)){$image="{$app[www]}/img/file_manager/zip.gif";$nom_type=$lang[app][filemanager][mess][61];}
		else if(eregi("\.ra$",$filename)){$image="{$app[www]}/img/file_manager/ram.gif";$nom_type=$lang[app][filemanager][mess][16];}
		else if(eregi("\.ram$",$filename)){$image="{$app[www]}/img/file_manager/ram.gif";$nom_type=$lang[app][filemanager][mess][17];}
		else if(eregi("\.rm$",$filename)){$image="{$app[www]}/img/file_manager/ram.gif";$nom_type=$lang[app][filemanager][mess][17];}
		else if(eregi("\.pl$",$filename)){$image="{$app[www]}/img/file_manager/pl.gif";$nom_type=$lang[app][filemanager][mess][18];}
		else if(eregi("\.zip$",$filename)){$image="{$app[www]}/img/file_manager/zip.gif";$nom_type=$lang[app][filemanager][mess][19];}
		else if(eregi("\.wav$",$filename)){$image="{$app[www]}/img/file_manager/wav.gif";$nom_type=$lang[app][filemanager][mess][20];}
		else if(eregi("\.php$",$filename)){$image="{$app[www]}/img/file_manager/php.gif";$nom_type=$lang[app][filemanager][mess][21];}
		else if(eregi("\.php3$",$filename)){$image="{$app[www]}/img/file_manager/php.gif";$nom_type=$lang[app][filemanager][mess][22];}
		else if(eregi("\.phtml$",$filename)){$image="{$app[www]}/img/file_manager/php.gif";$nom_type=$lang[app][filemanager][mess][22];}
		else if(eregi("\.exe$",$filename)){$image="{$app[www]}/img/file_manager/exe.gif";$nom_type=$lang[app][filemanager][mess][50];}
		else if(eregi("\.bmp$",$filename)){$image="{$app[www]}/img/file_manager/bmp.gif";$nom_type=$lang[app][filemanager][mess][56];}
		else if(eregi("\.png$",$filename)){$image="{$app[www]}/img/file_manager/gif.gif";$nom_type=$lang[app][filemanager][mess][57];}
		else if(eregi("\.css$",$filename)){$image="{$app[www]}/img/file_manager/css.gif";$nom_type=$lang[app][filemanager][mess][58];}
		else if(eregi("\.mp3$",$filename)){$image="{$app[www]}/img/file_manager/mp3.gif";$nom_type=$lang[app][filemanager][mess][59];}
		else if(eregi("\.xls$",$filename)){$image="{$app[www]}/img/file_manager/xls.gif";$nom_type=$lang[app][filemanager][mess][64];}
		else if(eregi("\.doc$",$filename)){$image="{$app[www]}/img/file_manager/doc.gif";$nom_type=$lang[app][filemanager][mess][65];}
		else if(eregi("\.pdf$",$filename)){$image="{$app[www]}/img/file_manager/pdf.gif";$nom_type=$lang[app][filemanager][mess][79];}
		else if(eregi("\.mov$",$filename)){$image="{$app[www]}/img/file_manager/mov.gif";$nom_type=$lang[app][filemanager][mess][80];}
		else if(eregi("\.avi$",$filename)){$image="{$app[www]}/img/file_manager/avi.gif";$nom_type=$lang[app][filemanager][mess][81];}
		else if(eregi("\.mpg$",$filename)){$image="{$app[www]}/img/file_manager/mpg.gif";$nom_type=$lang[app][filemanager][mess][82];}
		else if(eregi("\.mpeg$",$filename)){$image="{$app[www]}/img/file_manager/mpeg.gif";$nom_type=$lang[app][filemanager][mess][83];}
		else if(eregi("\.swf$",$filename)){$image="{$app[www]}/img/file_manager/flash.gif";$nom_type=$lang[app][filemanager][mess][91];}
		else {$image="{$app[www]}/img/file_manager/defaut.gif";$nom_type=$lang[app][filemanager][mess][23];}
		if($quoi=="image"){return $image;} else {return $nom_type;}
		}
	
	
	function dirsize($dir) {   
	   $dh = opendir($dir);
	   $size = 0;
	   while (($file = readdir($dh)) !== false)
	       if ($file != "." and $file != "..") {
	           $path = $dir."/".$file;
	           if (is_dir($path))
	               $size += dirsize($path);
	           elseif (is_file($path))
	               $size += filesize($path);
	       }
	   closedir($dh);
	   return $size;
	}
	
	function deldir($location) 
		{ 
		if(is_dir($location))
			{
			$all=opendir($location); 
			while ($file=readdir($all)) 
				{ 
				if (is_dir("$location/$file") && $file !=".." && $file!=".") 
					{ 
					$this->deldir("$location/$file"); 
					if(file_exists("$location/$file")){rmdir("$location/$file"); }
					unset($file); 
					}
				elseif (!is_dir("$location/$file"))
					{ 
					if(file_exists("$location/$file")){unlink("$location/$file"); }
					unset($file); 
					} 
				} 
			closedir($all);
			rmdir($location);
			}
		else 
			{
			if(file_exists("$location")) {unlink("$location");}
			}
		}

}
