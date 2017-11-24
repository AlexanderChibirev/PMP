<?php
$translations = [
    'keyboard' => 'клавиатура',
    'mouse' => 'мышь',
    'printer' => 'принтер',
    'screen' => 'экран'
];

if (!isset($_GET['word'])) {
    http_response_code(400);
    die();
}

if (!array_key_exists($_GET["word"], $translations)) {
    http_response_code(404);
    die();
}

echo ($translations[$_GET["word"]]);