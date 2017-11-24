<?php

function getRequestParam($argName)
{
    if(isset($_GET[$argName]))
    {
        return $_GET[$argName];
    }
    
    throw new Exception('Отсутствует требуемый параметр: ' . $argName);
}

function getRequestNumber($argName)
{
	$number = getRequestParam($argName);
    if(is_numeric($number))
    {
        return intval($number);
	}
	
    throw new Exception('Параметр ' . $argName . ' содержит данные, отличные от числовых');
}

function calculateResult($operation, $value1, $value2)
{
    switch($operation)
    {
    case "add":
        return $value1 + $value2;
    case "sub":
        return $value1 - $value2;
    case "mul":
        return $value1 * $value2;
        break;
    case "div":
        if($value2 === 0)
        {
            throw new Exception('Происходит деление на ноль');
        }
        return $value1 / $value2;
    default:
        throw new Exception('Параметр operation содержит некорректную операцию');
    }
}

try
{
    if(count($_GET) > 3)
    {
        throw new Exception('Переданы лишние параметры');
    } else if (count($_GET) < 3) {
		throw new Exception('Переданы не все параметры, требуются: arg1, arg2 и operation');
	}
    echo calculateResult(getRequestParam('operation')
                ,getRequestNumber('arg1')
                ,getRequestNumber('arg2'));
}
catch (Exception $ex)
{
    echo $ex->getMessage();
}