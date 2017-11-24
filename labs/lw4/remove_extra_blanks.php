<?php
function deleteExtraSpaces($string)
{
    return trim(str_replace('  ', ' ', $string));
}

if (!isset($_GET['text'])) {
    die();
}

echo deleteExtraSpaces($_GET['text']);