<?php

//Задание #3.1

function task1($xmlFile)
{
    $xmlToArray = json_decode(json_encode(simplexml_load_file($xmlFile)), true);
    orderPrint($xmlToArray);
}

function orderPrint(array $arrayName)
{
    foreach ($arrayName as $key => $value) {
        if (is_array($value)) {
            echo $br = is_numeric($key) ? '<br>' : '';
            orderPrint($value);
        } else {
            if ($key == 'Type') {
                echo "<b>$value address</b><br>";
            } elseif ($key == 'DeliveryNotes') {
                echo '<br>';
                echo "$key: $value<br>";
            } else {
                echo "$key: $value<br>";
            }
        }
    }
}

//Задача #3.2

function task2(array $arrayName)
{
    file_put_contents('output.json', json_encode($arrayName));
    echo "Создался файл <b>output.json</b> на основе переданного массива.<br>";

    $array = json_decode(file_get_contents('output.json'), true);
    $changedArray = arrayRandomChange($array);
    file_put_contents('output2.json', json_encode($changedArray));
    echo "На основе <b>output.json</b> создался <b>output2.json</b> с изменёнными данными.<br>";

    $arrOutput1 = json_decode(file_get_contents('output.json'), true);
    $arrOutput2 = json_decode(file_get_contents('output2.json'), true);
    echo "Изменённые элементы: <br>";
    arraysDifference($arrOutput1, $arrOutput2);
}

function arrayRandomChange(array $name)
{
    return array_map(function ($value) {
        if (!is_array($value)) {
            if (mt_rand(0, 1)) {
                return $value . ' changed';
            }
            return $value;
        }
        return arrayRandomChange($value);
    }, $name);
}

function arraysDifference($arr1, $arr2)
{
    foreach ($arr1 as $key => $value) {
        if (is_array($value)) {
            arraysDifference($arr1[$key], $arr2[$key]);
        } else {
            if ($value !== $arr2[$key]) {
                echo "$key => $value<br>";
            }
        }
    }
}

//Задача #3.3

function task3($arrayLength)
{
    $randomNumbers = [];
    for ($index = 0; $index < $arrayLength; $index++) {
        $randomNumbers[] = (array)mt_rand(1, 100);
    }

    $fp = fopen('data.csv', 'w+');
    foreach ($randomNumbers as $number) {
        fputcsv($fp, $number, ';');
    }
    fclose($fp);

    $fp = fopen('data.csv', 'r');
    $res = [];
    while ($row = fgetcsv($fp, 10000, ';')) {
        if ($row[0] % 2 == 0) {
            $res[] = $row[0];
        }
    }
    fclose($fp);
    echo 'Сумма чётных чисел равна: ' . array_sum($res) . '<br>';
}

//Задача #3.4

function task4($url)
{
    $data = json_decode(file_get_contents($url), true);
    parseData($data);
}

function parseData($name)
{
    foreach ($name as $key => $value) {
        if (($key == 'title' || $key == 'pageid') && $key != '0') {
            echo "<b>$key</b>: $value<br>";
        }
        if (is_array($value)) {
            parseData($value);
        }
    }
}
