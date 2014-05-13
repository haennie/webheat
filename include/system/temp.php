<?php
	
class sensor {
	
		
	function get($key) {
		
		$set_array['function'] = 'get';
		$set_array['key'] = $key;
		
		
		$result = $this->curl_request($set_array);
		
		return $result;
	}
	
	function set_temp($temp) {
		
		$set_array['function'] = 'set_temp'; 
		$set_array['requested_temp'] = $temp; 
		
		$result = $this->curl_request($set_array);
		
		return $result;
	}

    function oven_on() {

        $status = curl_request(array(
            'function' => 'oven_on'
        ));

        return $status;
    }

    function oven_off() {

        $status = curl_request(array(
            'function' => 'oven_off'
        ));

        return $status;
    }

    /**
     * curl_request()
     *
     * sends request to webheat api
     *
     * $post_array['function'] => defines called function (string)
     * $post_array['param'] => 'value' for requested values
     *
     * @param $post_array
     * @return mixed
     */

    function curl_request($post_array) {

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => SITE_URL.'/api/webheat_api.php',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => $post_array
		));
		$result = curl_exec($curl);
		curl_close($curl);

		return $result;
	}
}
	
	

?>