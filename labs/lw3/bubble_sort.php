<?php
function bubbleSort($array)
{
    $arrayLength = count($array);
    for ($i = 0; $i < $arrayLength; $i++) {
        for ($j = 0; $j < $arrayLength; $j++) {
            if ($array[$i] < $array[$j]) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }

    return $array;
}

if (!isset($_GET['numbers'])) {
    http_response_code( 400 );
    die();
}

$numberArray = [];
$givenArray = explode(',',  $_GET['numbers']);
foreach ($givenArray as $element) {
    if (!is_numeric($element)) {
        http_response_code(400);
        die();
    } else {
        array_push($numberArray, $element);
    }
}

$filtered = bubbleSort($numberArray);

echo implode(', ', $filtered);