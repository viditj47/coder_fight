<?php

	class Database{
	
		public function dbConnection(){
		
			$db_host = "localhost";
			
			$db_name = "hackcode_req_system";
			
			$db_username = "root";
			
			$db_password = "";
			
			$dns_db = 'mysql:host='.$db_host.';dbname='.$db_name.';';
			
			try{
				
				$site_db = new PDO($dns_db,$db_username,$db_password);
				
				$site_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				return $site_db;
				
			}
			catch(PDOException $e){
				
				echo $e->getMessage();
				exit();
				
			}
		
		}
	}

?>