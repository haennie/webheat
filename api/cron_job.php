<?php

file_put_contents('est.txt', 'sdf');
require_once '../include/system/config.php';
require_once 'api_class.php';


class cron_handler extends request_handler {

    function cron_handler() {
        parent::request_handler();

        parent::get_sensor_values();

    }
}

$initialize = new cron_handler();

