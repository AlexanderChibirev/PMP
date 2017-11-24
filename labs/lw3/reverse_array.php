<?php
if (!isset( $_GET['arr'])) {
    http_response_code(400);
    die();
}

$array = explode(',',  $_GET['arr']);
$arrayLength = count($array) - 1;

for ($i = 0; $i < ($arrayLength / 2) ; $i++) {
    $tempElement = $array[$i];
    $array[$i] = $array[$arrayLength - $i];
    $array[$arrayLength - $i] = $tempElement;
}

print_r($array);