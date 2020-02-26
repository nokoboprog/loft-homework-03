<?php
require_once('src/functions.php');


//Задание #3.1

echo '<b style="color: brown">Задание #3.1</b><br><br>';
task1('data.xml');
echo '<br><br>';


//Задача #3.2

echo '<b style="color: brown">Задание #3.2</b><br><br>';
$pets = [
    'hamster' => 'Bob',
    'dogs' => [
        'Musa',
        'Spaik',
        'Taison'
    ],
    'cats' => [
        'Murka',
        'Bagira'
    ],
    'birds' => [
        'parrots' => [
            'Gosha'
        ],
        'canaries' => [
            'Houston',
            'Luba'
        ]
    ]
];

task2($pets);
echo '<br><br>';


//Задача #3.3

echo '<b style="color: brown">Задание #3.3</b><br><br>';
task3(mt_rand(50, 100));
echo '<br><br>';


//Задача #3.4

echo '<b style="color: brown">Задание #3.4</b><br><br>';
$url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
task4($url);
echo '<br><br>';
