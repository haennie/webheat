<?php
	/**
	 * 
	 */
	class request_handler {
		
		private $current_temp;
		private $requested_temp;
		private $humidity;
		
		function request_handler() {
			
			//Read JSON File with Values -> insert in Class
			$json_values = file_get_contents('therm/therm_values.json');
			$values = json_decode($json_values);
			
			foreach($values as $name => $value) {
				$this->$name = $value;
			}
			
		}
		
		function set_temp($temp) {
			
			$this->requested_temp = $temp['temp'];
			$this->save();
			
			return $this->current_temp;
		}
		function get($param) {
			
			return $this->$param['key'];
		}
		
		
		function get_json_data() {
			
			$json_values = file_get_contents('therm/therm_values.json');
			return $json_values;
		}
		function save() {
			
			foreach ($this as $key => $value) {
				$array[$key] = $value;
			}
			$json_string = json_encode($array);
			
			return file_put_contents('therm/therm_values.json', $json_string);
		}
	}
	
?>