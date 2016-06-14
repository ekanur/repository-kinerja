<?

/*******************************************************************************
* Filename : db.php
* Description : db library (mysql)
*******************************************************************************/

class db
{
    /***************************************************************************
    * Description : constructor
    ***************************************************************************/
    function connect()
    {
    	global $app;
        $app[db][connection] = @mysql_connect($app[db][server], $app[db][username], $app[db][password]);
		if (!$app[db][connection]):
			return FALSE;
		endif;
		if (!@mysql_select_db($app[db][name])):
			return FALSE;
		endif;
		return TRUE;
               
    }

    /***************************************************************************
    * Description : perform default query
    ***************************************************************************/
    function query($sql, &$result, &$nr)
    {
        global $app;
		$result = mysql_query($sql, $app[db][connection]);
    	if (eregi("select", $sql)):
    	    $nr = mysql_num_rows($result);
    	endif;
		if (mysql_error()):
			if ($app[debug]):
				$err[] = "SQL : $sql";
				$err[] = "ERROR : " . mysql_error();
				app::debug($err);
				exit;
			endif;
		endif;
    }

    /***************************************************************************
    * Description : perform only simple query (delete/update)
    ***************************************************************************/
    function qry($sql)
    {
        global $app;		
        $rs = mysql_query($sql, $app[db][connection]);		
		if (mysql_error()):
			if ($app[debug]):
				$err[] = "SQL : $sql";
				$err[] = "ERROR : " . mysql_error();
				app::debug($err);
				exit;
			endif;
		endif;
		unset($rs);
    }

	/***************************************************************************
    * Description : fetching single record from database [simple]
    ***************************************************************************/
    function get_record()
    {
        global $app;
		$args = func_get_args();
		switch (func_num_args()):
			case 2:
				$sql = "select * from {$app[table][$args[0]]} where $args[1] limit 1";
				break;
			case 3:
				$sql = "select * from {$app[table][$args[0]]} where $args[1] = '$args[2]' limit 1";
				break;
		endswitch;
    	db::query($sql, $rs, $nr);
    	if ($nr):
    	    $record = db::fetch($rs);
    	else:
    	    $record[0] = "";
    	endif;
		//unset($rs);
    	return $record;
    }

	/***************************************************************************
    * Description : fetching recorset from database
    ***************************************************************************/
    function get_recordset()
    {
        global $app;
		$args = func_get_args();
		switch (func_num_args()):
			case 1:
				$sql = "select * from {$app[table][$args[0]]}";
				break;
			case 2:
				$sql = "select * from {$app[table][$args[0]]} where $args[1]";
				break;
			case 3:
				$sql = "select * from {$app[table][$args[0]]} where $args[1] = '$args[2]'";
				break;
		endswitch;
    	db::query($sql, $rs, $nr);
    	return $rs;
    }

    /***************************************************************************
    * Description : deleting record on specified table
	* Param : table_name, arr_record_id (using id fields)
	*         table_name, field, value
    ***************************************************************************/
    function delete_record()
    {
        global $app;
		$numargs = func_num_args();
		$args = func_get_args();
		$sql = "delete from {$app[table][$args[0]]} where 0!=0 ";
		if ($numargs == 2):
			if (is_array($args[1])):
				for ($x=0; $x < count($args[1]); $x++):
					$sql .= "or id = '{$args[1][$x]}' ";
				endfor;
			else:
				$sql .= "or id = '$args[1]' ";
			endif;
		else:
			if (is_array($args[2])):
				for ($x=0; $x < count($args[2]); $x++):
					$sql .= "or $args[1] = '{$args[2][$x]}' ";
				endfor;
			else:
				$sql .= "or $args[1] = '$args[2]' ";
			endif;
		endif;		
    	db::qry($sql);
    }

    /***************************************************************************
    * Description : fetching query result to array + move pointer 1 level
    ***************************************************************************/
    function fetch($result)
    {
        global $app;
        return @mysql_fetch_assoc($result);
    }

    /***************************************************************************
    * Description : seek db
    ***************************************************************************/
    function seek(&$result, $pointer=0)
    {
        global $app;
        @mysql_data_seek($result, $pointer);
    }

    /***************************************************************************
    * Description : close connection, this is unnecessary function
    ***************************************************************************/
    function close()
    {
        global $app;
    	@mysql_close($app[db][connection]);
    }

    /***************************************************************************
    * Description : lookup
	* Param : field, table, field_key, $field_value
	*         field, table, condition
    ***************************************************************************/
    function lookup()
    {
        global $app;
		$args = func_get_args();
		switch (func_num_args()):
			case 3:
				$sql = "select $args[0] from {$app[table][$args[1]]} where $args[2] limit 1";
				break;
			case 4:
				$sql = "select $args[0] from {$app[table][$args[1]]} where $args[2] = '$args[3]' limit 1";
				break;
		endswitch;
    	db::query($sql, $rs, $nr);
    	if ($nr):
    	    $record = db::fetch($rs);
    	endif;
    	return $record[$args[0]];
    }
    
    /***************************************************************************
    * Description : lookup
	* Param : field, table, field_key, $field_value
	*         field, table, condition
    ***************************************************************************/
    function alookup()
    {
        global $app;
		$args = func_get_args();
		switch (func_num_args()):
			case 3:
				$sql = "select $args[0] from {$app[table][$args[1]]} where $args[2]";
				break;
			case 4:
				$sql = "select $args[0] from {$app[table][$args[1]]} where $args[2] = '$args[3]'";
				break;
		endswitch;
    	db::query($sql, $rs, $nr);
    	if ($nr):
    		while ($row = @db::fetch($rs)):
    	    	$record[] = $row[$args[0]];
    	    endwhile;
    	endif;
    	return $record;
    }

	function dmylookup($field,$table,$kriteria)
	{
        global $app;
    	$sql = "select $field from {$app[table][$table]} where ".$kriteria;		
    	$result = db::query($sql, $rs, $numrows);		
    	echo mysql_error();

    	if ($numrows):
    	    while ($record = mysql_fetch_array($rs)):
				$hasil[]=$record[0];
			endwhile;
    	else:
    	    $record[0]="";
			$hasil=$record[0];
    	endif;
    	return $hasil;		
	 }

	 function mylookup($field,$table,$kriteria)
	{
      global $app;
    	$sql = "select $field from {$app[table][$table]} where ".$kriteria;
    	//echo $sql;
    	$result = db::query($sql, $rs, $numrows);
    	echo mysql_error();
    	if ($numrows):
    	    $record = mysql_fetch_array($rs);
    	else:
    	    $record[0]="";
    	endif;
    	return $record[$field];
	}

	function amylookup($field,$table,$kriteria)
	{
        global $app; 
		if ($kriteria!=""):
			$sql = "select $field from {$app[table][$table]} where $kriteria";			
		else:
			$sql = "select $field from {$app[table][$table]}";
		endif;
		$result = db::query($sql, $rs, $numrows);		
    	echo mysql_error();
    	if ($numrows):
    	    while ($record = mysql_fetch_array($rs)):
				$hasil[]=$record;
			endwhile;
    	else:
    	    $record[0]="";
    	endif;
    	return $hasil;
	}

	function my_implode($param,$string)
	{
		global $app;
		if (strlen($string)!=0):
			$hasil=implode($string,$param);
		else:
			$hasil="''";
		endif;
		return $hasil;
	}
	
	function hapus_record($table,$kriteria)
	{
		global $app;
		$sql = "delete from {$app[table][$table]} where ".$kriteria;
		db::qry($sql);
		echo mysql_error();
	}	

    /***************************************************************************
    * Description : perform num rows
    ***************************************************************************/
    function nr(&$rs)
    {
        global $app;
        return @mysql_num_rows($rs);
    }
    
    /***************************************************************************
    * Description : to concatenation array database result
    ***************************************************************************/

	function db_implode($param,$string,$as_string=false)
	{
		global $app;
		if (strlen($param)!=0):
			if ($as_string):
				foreach($string as $k=>$v){
					$string[$k] = "'".$v."'";
				}
			endif;
			$hasil=implode($param,$string);
		else:
			$hasil="''";
		endif;
		return $hasil;
	}

	/***************************************************************************
    * Description : update_table
    ***************************************************************************/
	function update_table($field,$table,$kriteria)
	{
        global $app;		
		if ($kriteria!=""):
	    	$sql = "update {$app[table][$table]} set ".$field." where ".$kriteria;				
		else:
			$sql = "update {$app[table][$table]} set ".$field;				
		endif;
    	db::qry($sql);
	}

}

?>