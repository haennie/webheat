<?php

require_once '../include/system/config.php';
require_once 'api_class.php';


class cron_handler extends request_handler {

    function cron_handler() {
        parent::request_handler();

        parent::get_sensor_values();

        $this->check_temp();

    }

    function check_temp() {

        $tolerance = 0.1;
        $rt = $this->requested_temp;
        $ct = $this->current_temp;

        if($ct + $tolerance <= $rt) {
            $this->oven_on();
        }
        else if($ct >= $rt) {
            $this->oven_off();
        }


    }
}

$initialize = new cron_handler();
sleep(30);
$init_2 = new cron_handler();

