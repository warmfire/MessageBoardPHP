<?php
	
	include('comm.php');
	function connect($tableName)
	{
		mysql_connect('127.0.0.1', 'root', '');
		mysql_select_db($tableName);
		mysql_query("set names 'utf8'");
	}
	
	function select($tableName, $other = '')
	{
		$sql = "select * from " . $tableName . $other . ";";
		$query = mysql_query($sql);
		$res_arr = array();
		while ($rs = mysql_fetch_array($query, MYSQL_ASSOC)) {
			$res_arr[] = $rs;
		}
		return $res_arr;
	}

//增
		function insert($data, $table, $return_insert_id = false, $replace = false) {
			if(!is_array( $data ) || $table == '' || count($data) == 0) {
				return false;
			}			
			$fielddata = array_keys($data);
			$valuedata = array_values($data);	
			array_walk($valuedata,'escape_string');
			
			$field = implode (',', $fielddata);
			$value = implode (',', $valuedata);
			
			$cmd = $replace ? 'REPLACE INTO' : 'INSERT INTO';			
			$sql = $cmd.' `'.$table.'`('.$field.') VALUES ('.$value.')';
			$return = mysql_query($sql);			
			return $return_insert_id ? mysql_insert_id() : $return;
		}
		
		
		function escape_string(&$value, $key='', $quotation = 1) {
			if ($quotation) {
				$q = '\'';
			} else {
				$q = '';
			}
			$value = $q.$value.$q;
			return $value;
		}
?>