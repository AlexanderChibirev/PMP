<?php
$argsCount = $argc - 1;

if ($argsCount == 0) {
	echo 'No parameters were specified!';
} else {
	echo 'Number of arguments: ' . $argsCount . PHP_EOL;
	echo 'Arguments: ';
	for ($i = 1; $i <= $argsCount; $i++) {
		echo $argv[$i] . ' ';
	}
}