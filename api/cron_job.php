<?php

require_once 'api_class.php';

$initialize = new cron_handler();

class cron_handler extends request_handler {

    function cron_handler() {
        parent::request_handler();

        parent::get_sensor_values();

    }
}


