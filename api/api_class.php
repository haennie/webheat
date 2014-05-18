<?php
	/**
	 * 
	 */
	class request_handler {
		
		private $current_temp;
		private $requested_temp;
		private $humidity;
        private $oven_status;
		
		function request_handler() {
			
			//Read JSON File with Values -> insert in Class
			$json_values = file_get_contents('therm/therm_values.json');
			$values = json_decode($json_values);
			
			foreach($values as $name => $value) {
				$this->$name = $value;
			}

            $this->oven_status();
			
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

            $array = array();

			foreach ($this as $key => $value) {
				$array[$key] = $value;
			}
			$json_string = json_encode($array);
			
			return file_put_contents('therm/therm_values.json', $json_string);
		}

        function oven_on() {

            shell_exec('gpio -g mode '.OVEN_PIN.' out');
            shell_exec('gpio -g write '.OVEN_PIN.' 1');
            $this->oven_status = shell_exec('gpio -g read '.OVEN_PIN);

            $this->save();

            return $this->oven_status;

        }

        function oven_off() {

            shell_exec('gpio -g mode '.OVEN_PIN.' out');
            shell_exec('gpio -g write '.OVEN_PIN.' 0');
            $this->oven_status = shell_exec('gpio -g read '.OVEN_PIN);

            $this->save();

            return $this->oven_status;

        }
        function oven_status() {

            shell_exec('gpio -g mode '.OVEN_PIN.' out');
            $this->oven_status = shell_exec('gpio -g read '.OVEN_PIN);
            file_put_contents('status.txt', $this->oven_status());
            $this->save();

            return $this->oven_status;

        }
        function get_sensor_values() {
            $sensor_string = shell_exec('sudo /home/pi/programme/lol_dht22/loldht '.THERMOMETER_PIN);
            //$sensor_string = "Raspberry Pi wiringPi DHT22 reader www.lolware.net Data not good, skip Humidity = 41.80 % Temperature = 21.50 *C ";

            $sensor_string =  substr($sensor_string, -32, -5);
            $this->humidity = substr($sensor_string, 0, -21);
            $this->current_temp = substr($sensor_string, -5);

            $this->save();
            $ret_array = array();
            foreach($this as $key => $value) {
                $ret_array[$key] = $value;
            }

            return json_encode($ret_array);
        }
	}
	
?>