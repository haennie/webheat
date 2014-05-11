<?php
	/**
	* DB Function
	*/
	class db {
		
				
		function db_query($query) {
	
			$con = mysqli_connect(DB_SERVER, DB_USER, DB_PW, DB_DBNAME);
	
			if (mysqli_connect_errno($con))
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			else {
	
				$result = mysqli_query($con, $query);
				mysqli_close($con);
				
				return $result;
	
			}
		}
	
		function db_fetch($result) {
	
			return mysqli_fetch_assoc($result);
	
		}
		function login($user, $pw) {
			
			$result =  $this->db_query("SELECT user_id FROM users WHERE user_name = '$user' AND user_hash = '$pw'");
			$row = $this->db_fetch($result);
		
			if(!empty($row)) {
				$_SESSION['name'] = $row['user_id'];
			}
			else {
				echo $lbl_string['LBL_WRONG_USERDATA'];
			}
		}
	}
?>