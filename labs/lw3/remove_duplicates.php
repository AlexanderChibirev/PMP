<?php
if ($argc != 2) {
    echo 'Usage php remove_duplicates.php <input string>';
} else {
    $stringToParse = $argv[1];
    echo implode('', array_unique(str_split($stringToParse)));
}