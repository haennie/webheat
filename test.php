<?php
/**
 * Created by PhpStorm.
 * User: hennie
 * Date: 11.05.14
 * Time: 14:31
 */


$oven_test = new sensor();
$status = $oven_test->curl_request(array(
    'function' => 'oven_on'
));

echo 'Oven is'. $status;