<?php
if (!isset($_GET['string'])) {
    http_response_code(400);
    die();
}

$elementsCount = [];
$charArray = preg_split('//u', $_GET['string'], -1, PREG_SPLIT_NO_EMPTY);//str_split( $_GET['string'] );
foreach ($charArray as $char ) {
    $char = strtolower( $char );
    if (!array_key_exists( $char, $elementsCount)) {
        $elementsCount[$char] = 1;
    } else {
        $elementsCount[$char] += 1;
    }
}

foreach ($elementsCount as $element => $count) {
    if ($element === ' ') {
        echo '" " (пробел)' . ' - '.$count . '</br>';
    } else {
        echo $element.' - ' . $count . '</br>';
    }
}