<?

/*******************************************************************************
* Filename : db.php
* Description : db library (postgre)
*******************************************************************************/


class db
{
    /***************************************************************************
    * Description : constructor
    ***************************************************************************/
	function connect()
    {
    	global $app;
			$app['db']['start_conn']="pg_connect";
			$app['db']['close_conn']="pg_close";
			$app['db']['query']="pg_query";
			$app['db']['error']="pg_last_error";
			$app['db']['num_rows']="pg_num_rows";
			$app['db']['random']="random()";
			$app['db']['fetch_assoc']="pg_fetch_assoc";
			$app['db']['fetch_array']="pg_fetch_array";
			$conn_string="host={$app[db][server]} port=5432 dbname={$app[db][name]} user={$app[db][username]} password={$app[db][password]}";
			$app['db']['connection'] = $app['db']['start_conn']($conn_string);
		if (!$app['db']['connection']):
			return FALSE;
		else:
			return TRUE;	
		endif;
	}
    function connect_finnet()
    {
    	global $app;
			$app[db][start_conn]="pg_connect";
			$app[db][close_conn]="pg_close";
			$app[db][query]="pg_query";
			$app[db][error]="pg_last_error";
			$app[db][num_rows]="pg_num_rows";
			$app[db][random]="random()";
			$app[db][fetch_assoc]="pg_fetch_assoc";
			$app[db][fetch_array]="pg_fetch_array";
			$conn_string="host={$app[db_finnet][server]} port=5432 dbname={$app[db_finnet][name]} user={$app[db_finnet][username]} password={$app[db_finnet][password]}";
        	$app[db][connection_finnet] = $app[db][start_conn]($conn_string);
		if (!$app[db][connection_finnet]):
			return FALSE;
		else:
			return TRUE;
		endif;
	}
	function connect_akademik()
    {
    	global $app;
			$app['db']['start_conn']="pg_connect";
			$app['db']['close_conn']="pg_close";
			$app['db']['query']="pg_query";
			$app['db']['error']="pg_result_error";
			$app['db']['num_rows']="pg_num_rows";
			$app['db']['random']="random()";
			$app['db']['fetch_assoc']="pg_fetch_assoc";
			$app['db']['fetch_array']="pg_fetch_array";
			$conn_string="host={$app[db][server_akademik]} port=5432 dbname={$app[db][name]} user={$app[db][username]} password={$app[db][password]}";
        	$app['db']['connection_akademik'] = $app['db']['start_conn']($conn_string);
		if (!$app['db']['connection_akademik']):
			return FALSE;
		else:
			return TRUE;	
		endif;
	}

    /***************************************************************************
    * Description : perform default query
    ***************************************************************************/
    function query($sql, &$result, &$nr)
    {
        global $app;
		$result = $app[db][query]($app[db][connection],$sql);
		if (eregi("select", $sql)):
    	    $nr = $app[db][num_rows]($result);
    	endif;
		if(@$app[db][error]($result)){
			if ($app[debug]):
				$err[] = "SQL : $sql";
				$err[] = "ERROR : " . @$app[db][error]($result);
				//app::debug($err);
				exit;
			endif;
		
		}
	}
	/***************************************************************************
    * Description : perform default query
    ***************************************************************************/
    function query_finnet($sql, &$result, &$nr)
    {
        global $app;
		$result = $app[db][query]($app[db][connection_finnet],$sql);
		if (eregi("select", $sql)):
    	    $nr = $app[db][num_rows]($result);
    	endif;
		if(@$app[db][error]($result)){
			if ($app[debug]):
				$err[] = "SQL : $sql";
				$err[] = "ERROR : " . @$app[db][error]($result);
				//app::debug($err);
				exit;
			endif;

		}
	}
	 /***************************************************************************
    * Description : perform default query
    ***************************************************************************/
    function query_akademik($sql, &$result_akademik, &$nr_akademik)
    {
        global $app;
		$result_akademik = $app['db']['query']($app['db']['connection_akademik'],$sql);
		if (eregi("select", $sql)):
    	    $nr_akademik = $app['db']['num_rows']($result_akademik);
    	endif;
		if($app['db']['error']($app['db']['connection_akademik'])){
			if ($app[debug]):
				$err[] = "SQL : $sql";
				$err[] = "ERROR : " . @$app['db']['error']($result_akademik);
				print_r($err);
				exit;
			endif;
		
		}
	}

    /***************************************************************************
    * Description : perform only simple query (delete/update)
    ***************************************************************************/
    function qry($sql)
    {
        global $app;
		$rs = $app[db][query]($app[db][connection],$sql);
		if($app[db][error]($app[db][connection])){
			if ($app[debug]):
				$err[] = "SQL : $sql";
				$err[] = "ERROR : " . $app[db][error]($result);
				app::debug($err);
				exit;
			endif;
			$app[err_qry]=1;
		}
		unset($rs);
    }
	 /***************************************************************************
    * Description : perform only simple query (delete/update)
    ***************************************************************************/
    function qry_akademik($sql)
    {
        global $app;
		$rs = $app[db][query]($app[db][connection_akademik],$sql);
		if($app[db][error]($result)){
			if ($app[debug]):
				$err[] = "SQL : $sql";
				$err[] = "ERROR : " . $app[db][error]($result);
				//app::debug($err);
				exit;
			endif;
			$app[err_qry]=1;
		}
		unset($rs);
    }
    	 /***************************************************************************
    * Description : perform only simple query (delete/update)
    ***************************************************************************/
    function qry_finnet($sql)
    {
        global $app;
		$rs = $app[db][query]($app[db][connection_finnet],$sql);
		if($app[db][error]($app[db][connection_finnet])){
			if ($app[debug]):
				$err[] = "SQL : $sql";
				$err[] = "ERROR : " . $app[db][error]($result);
				//app::debug($err);
				exit;
			endif;
			$app[err_qry]=1;
		}
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
	unset($rs);
    	return $record;
    }
	
	/***************************************************************************
    * Description : get max id
    ***************************************************************************/
    function get_random()
    {
        global $app;
		$args = func_get_args();
		switch (func_num_args()):
			case 1:
				$sql = "select * from {$app[table][$args[0]]} where 0=0 order by {$app[db][random]} limit 1";
				break;
			case 2:
				$sql = "select * from {$app[table][$args[0]]} where $args[1]  order by {$app[db][random]} limit 1";
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
    * Description : get total
    ***************************************************************************/
    function get_total()
    {
        global $app;
		$args = func_get_args();
		switch (func_num_args()):
			case 1:
				$sql = "select count(title) as jml from {$app[table][$args[0]]} where 0=0 and status=1";
				break;
			case 2:
				$sql = "select count(title) as jml from {$app[table][$args[0]]} where $args[1] and status=1";
				break;
			case 3:
				$sql = "select count($args[0]) as jml from {$app[table][$args[1]]} where $args[2] limit 1";
				break;
		endswitch;
    	db::query($sql, $rs, $nr);
    	if ($nr):
    	     $record = db::fetch($rs);
			 $tot=$record[jml];
    	else:
    	     $tot = "";
    	endif;
		//unset($rs);
    	return $tot;
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
        return @$app[db][fetch_assoc]($result);
    }

    /***************************************************************************
    * Description : fetching query result to array + move pointer 1 level
    ***************************************************************************/
    function fetch_akademik($result_akademik)
    {
        global $app;
        return @$app[db][fetch_assoc]($result_akademik);
    }

    /***************************************************************************
    * Description : close connection, this is unnecessary function
    ***************************************************************************/
    function close()
    {
        global $app;
    	//@$app[close][conn]($app[db][connection]);
	@$app[db][close_conn]($app[db][connection]);
    }
    /***************************************************************************
    * Description : close connection, this is unnecessary function
    ***************************************************************************/
    function close_akademik()
    {
        global $app;
    	//@$app[close][conn]($app[db][connection]);
	@$app['db']['close_conn']($app['db']['connection_akademik']);
    }
      /***************************************************************************
    * Description : close connection, this is unnecessary function
    ***************************************************************************/
    function close_finnet()
    {
        global $app;
    	//@$app[close][conn]($app[db][connection]);
	@$app[db][close_conn]($app[db_finnet][connection]);
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
    function lookup_finnet()
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
    	db::query_finnet($sql, $rs, $nr);
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
    function lookup_akademik()
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
    	db::query_akademik($sql, $rs, $nr);
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
    	//echo mysql_error();

    	if ($numrows):
    	    while ($record = $app[db][fetch_array]($rs)):
				$hasil[]=$record[0];
			endwhile;
    	else:
    	    $record[0]="";
			$hasil=$record[0];
    	endif;
    	return $hasil;		
	 }
	 
	 	function dmylookup_akademik($field,$table,$kriteria)
	{
        global $app;
    	$sql = "select $field from {$app[table][$table]} where ".$kriteria;		
    	$result = db::query_akademik($sql, $rs, $numrows);		
    	//echo mysql_error();

    	if ($numrows):
    	    while ($record = $app[db][fetch_array]($rs)):
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
    	//echo mysql_error();
    	if ($numrows):
    	    $record = $app[db][fetch_array]($rs);
    	else:
    	    $record[0]="";
    	endif;
    	return $record[$field];
	}
	
	 function mylookup_akademik($field,$table,$kriteria)
	{
      global $app;
    	$sql = "select $field from {$app[table][$table]} where ".$kriteria;
    	//echo $sql;
    	$result = db::query_akademik($sql, $rs, $numrows);
    	//echo mysql_error();
		//echo $numrows;
    	if ($numrows):
    	    $record = $app[db][fetch_array]($rs);
			//print_r($record);
    	else:
    	    $record[0]="";
    	endif;
    	return $record[$field];
	}

	function amylookup($field,$table,$kriteria="")
	{
        global $app; 
		if ($kriteria!=""):
			$sql = "select $field from {$app[table][$table]} where $kriteria";			
		else:
			$sql = "select $field from {$app[table][$table]}";
		endif;
		$result = db::query($sql, $rs, $numrows);		
    	//echo mysql_error();
    	if ($numrows):
    	    while ($record = $app[db][fetch_array]($rs)):
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
		//echo mysql_error();
	}	

    /***************************************************************************
    * Description : perform num rows
    ***************************************************************************/
    function nr(&$rs)
    {
        global $app;
        return @$app[db][num_rows]($rs);
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
	function update_table($table,$field,$kriteria)
	{
        global $app;		
		if ($kriteria!=""):
	    	$sql = "update {$app[table][$table]} set ".$field." where ".$kriteria;				
		else:
			$sql = "update {$app[table][$table]} set ".$field;				
		endif;
    	db::qry($sql);
	}
	
	/***************************************************************************
    * Description : insert_to_table
    ***************************************************************************/
	function insert_to_table($table,$field,$values)
	{
        global $app;		
		$sql = "insert into {$app[table][$table]}(".$field.") values(".$values.")";				
	   	db::qry($sql);
	}

}

?>
