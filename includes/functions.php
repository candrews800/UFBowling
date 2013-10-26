<?php
	
	function confirm_query($query_set)	{
		if(!$query_set){
			die("Database query failed: " . mysql_error());
		}
		
	}	
	function num_of_rows($table){
		$result_set = mysql_query("SELECT * FROM  {$table}");
		return mysql_num_rows($result_set);
	}
	
	function first_id($table){
		$query = "SELECT * 
				  FROM  `{$table}` 
				  ORDER BY  `{$table}`.`id` ASC";
		$result_set = mysql_query($query);
		$result = mysql_fetch_array($result_set);
		return $result['id'] + 1;
	}
	
	function last_id($table){
		$query = "SELECT * 
				  FROM  `{$table}` 
				  ORDER BY  `{$table}`.`id` DESC";
		$result_set = mysql_query($query);
		$result = mysql_fetch_array($result_set);
		return $result['id'] + 1;
	}
	
	function redirect_to($url)
	{
		header("Location: {$url}");
	}
	
	function first_order_id($table){
		$query = "SELECT *
			 	  FROM {$table}
			      ORDER BY order_id ASC
			  	  LIMIT 1";
	
		$result_set = mysql_query($query);
	
		$result = mysql_fetch_array($result_set);
	
		return $result['order_id'];
	}

	function last_order_id($table){
		$query = "SELECT *
			  	  FROM {$table}
			  	  ORDER BY order_id DESC
			  	  LIMIT 1";
	
		$result_set = mysql_query($query);
	
		$result = mysql_fetch_array($result_set);
	
		return $result['order_id'];
	}
	
	function page_count($page){
		$date = date("Y-m-d");

		$query = "SELECT *
			 	  FROM site_statistics
			      WHERE site_statistics.date='{$date}'";
				  
		
				  
		$result_set = mysql_query($query);
		
		if(mysql_num_rows($result_set) == 0 ){
			$query = 	"INSERT INTO `site_statistics` (
						`date` ,
						`page_views` ,
						`home` ,
						`about` ,
						`schedule` ,
						`roster` ,
						`media` ,
						`store` ,
						`sponsor1` ,
						`sponsor2`
						)
						VALUES (
						'{$date}',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0'
						)";
				  
			$result_set = mysql_query($query);
			
			$query = "SELECT *
			 	  FROM site_statistics
			      WHERE date='{$date}'";
				  
			$result_set = mysql_query($query);
		}
		
		$entry = mysql_fetch_array($result_set);
		
		$stat = $entry[$page] + 1;
		$count = $entry['page_views'] + 1;
		
		$query = "UPDATE site_statistics
			 	  SET {$page} = '{$stat}', page_views = '{$count}'
			  	  WHERE date='{$date}'";
		$result = mysql_query($query);
		
		echo mysql_error();
	}
	
?>