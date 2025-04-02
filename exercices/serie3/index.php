<?php

// EXERCICE 1

$fruits = ['Pomme', 'Poire', 'Banane', 'Cerise', 'Fraise'];

print_r($fruits);
echo "<br>";

echo $fruits[2];
echo "<br>";

// EXERCICE 2

$person = [
    'firstName' => 'John',
    'lastName' => 'Doe',
    'age' => 30,
    'city' => 'New York'
];

print_r($person);
echo "<br>";

echo $person['age'];
echo "<br>";

// EXERCICE 3

$ticTacToe = [
    ['X', 'O', 'X'],
    ['O', 'X', 'O'],
    ['X', 'O', 'X']
];

print_r($ticTacToe);
echo "<br>";

echo $ticTacToe[1][2];
echo "<br>";

// EXERCICE 4

$people = [
    [
        'name' => 'John Doe',
        'age' => 30,
        'city' => 'New York'
    ],
    [
        'name' => 'Jane Doe',
        'age' => 25,
        'city' => 'Los Angeles'
    ],
    [
        'name' => 'Alice Smith',
        'age' => 35,
        'city' => 'Chicago'
    ]
];

print_r($people);
echo "<br>";

echo $people[2]['name'];
echo "<br>";

// EXERCICE 5

$fruitsAndVegetables = [
    'fruits' => ["Pomme", "Poire", "Banane", "Cerise", "Fraise"],
    'vegetables' => ["Carotte", "Tomate", "Salade", "Concombre", "Radis"]
];

print_r($fruitsAndVegetables);
echo "<br>";

print_r($fruitsAndVegetables['vegetables']);
echo "<br>";

// EXERCICE 6

$people = [
    'johnDoe' => [
        'name' => 'John Doe',
        'age' => 30,
        'city' => 'New York'
    ],
    'janeDoe' => [
        'name' => 'Jane Doe',
        'age' => 25,
        'city' => 'Los Angeles'
    ],
    'aliceSmith' => [
        'name' => 'Alice Smith',
        'age' => 35,
        'city' => 'Chicago'
    ]
];

print_r($people);
echo "<br>";

echo $people['janeDoe']['name'];
echo "<br>";

// EXERCICE 7

$fruits = ['Pomme', 'Poire', 'Banane', 'Cerise', 'Fraise'];

for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i];
    echo "<br>";
}

$i = 0;
while ($i < count($fruits)) {
    echo $fruits[$i];
    echo "<br>";
    $i++;
}

$i = 0;
do {
    echo $fruits[$i];
    echo "<br>";
    $i++;
} while ($i < count($fruits));

foreach ($fruits as $fruit) {
    echo $fruit;
    echo "<br>";
}

// EXERCICE 8

$ticTacToe = [
    ['X', 'O', 'X'],
    ['O', 'X', 'O'],
    ['X', 'O', 'X']
];

for ($i = 0; $i < count($ticTacToe); $i++) {
    for ($j = 0; $j < count($ticTacToe[$i]); $j++) {
        echo "Ligne " . $i+1 . ", colonne " . $j+1 . " : " . $ticTacToe[$i][$j];
        echo "<br>";
    }
}

// EXERCICE 9

$people = [
    [
        'name' => 'John Doe',
        'age' => 30,
        'city' => 'New York'
    ],
    [
        'name' => 'Jane Doe',
        'age' => 25,
        'city' => 'Los Angeles'
    ],
    [
        'name' => 'Alice Smith',
        'age' => 35,
        'city' => 'Chicago'
    ]
];

foreach ($people as $person) {
    print_r($person);
    echo "<br>";
}

foreach ($people as $person) {
    echo "<br>";
    echo "Nom : " . $person['name'] . "<br>";
    echo "Âge : " . $person['age'] . "<br>";
    echo "Ville : " . $person['city'] . "<br>";
}

// EXERCICE 10

/*
<?php
function printArray($numberOfElementsToDisplay = 1, $array) {
    for ($i = 0; $i <= $numberOfElementsToDisplay; $i++) {
        // Affichage de l'élément ligne par ligne
        echo $array[$i];
    }
}

$fruits = ["Pomme", "Poire", "Banane", "Cerise", "Fraise"];

$printArray(3, fruits);
 */


function printArray($array, $numberOfElementsToDisplay = 1) // param. optionnel après param. obligatoire
{
    for ($i = 0; $i < $numberOfElementsToDisplay; $i++) { // < pas <=
        // Affichage de l'élément ligne par ligne
        echo $array[$i];
        echo "<br>"; // pour passer à la ligne
    }
}

$fruits = ["Pomme", "Poire", "Banane", "Cerise", "Fraise"];

printArray($fruits, 3); // pas de $ pour une fonction, inverser l'ordre des param.

// EXERCICE 11

$start = 1;
$end = 10;

function shuffleRange($start, $end) {
    $array = range($start, $end);
    shuffle($array);
    return $array;
}
print_r(shuffleRange($start, $end));
echo "<br>";

// EXERCICE 12

$fruits = ["Pomme", "Poire", "Banane", "Cerise", "Fraise"];
sort($fruits);

print_r($fruits);
echo "<br>";

// EXERCICE 13

$people = [
    [
        'name' => 'John Doe',
        'age' => 30,
        'city' => 'New York'
    ],
    [
        'name' => 'Jane Doe',
        'age' => 25,
        'city' => 'Los Angeles'
    ],
    [
        'name' => 'Alice Smith',
        'age' => 35,
        'city' => 'Chicago'
    ]
];

usort($people, function ($a, $b) {return $a['age'] - $b['age'];});
print_r($people);
echo "<br>";

// EXERCICE 14

usort($people, function ($a, $b) {return strcmp($a['name'], $b['name']);});
print_r($people);
echo "<br>";

// EXERCICE 15

$start = 15;
$end = 30;

function sumRange($start, $end) {
    $array = range($start, $end);
    return array_sum($array);
}

echo sumRange($start, $end);
echo "<br>";

// EXERCICE 16

$string = "Hello, world!";

function reverseWordOrder($string) {
    $array = explode(" ", $string);
    return implode(" ", array_reverse($array));
}

echo reverseWordOrder($string);
echo "<br>";

// EXERCICE 17

function reverseWords($string) {
    $array = explode(" ", $string);
    return implode(" ", array_map('strrev', $array));
}

echo reverseWords($string);
echo "<br>";