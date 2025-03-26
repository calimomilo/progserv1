<?php

// EXERCICE 1
echo "Hello, World!<br>";

// Réponse : Hello, World

// EXERCICE 2
$name = "Camilo";
echo "Bonjour $name !<br>";

// EXERCICE 3
$age = 20;
if ($age > 18) {
    echo "You are over 18.<br>";
} else {
    echo "You are under 18.<br>";
}

// EXERCICE 4
const PI = 3.14;
echo PI . "<br>";

// EXERCICE 5
$number = 10;
$double = $number * 2;
echo $double . "<br>";

// EXERCICE 6
echo 'Bonjour, $name!<br>';
echo "Bonjour, $name!<br>";

// Réponse : '' n'interprète pas les variables

// EXERCICE 7
$text = "PHP";
echo "J'apprends " . $text . " dans ce nouveau cours ProgServ1.<br>";

// EXERCICE 8
$hasABachelorsDegree = false;
$hasFinishedHeig = false;
if ($hasABachelorsDegree && $hasFinishedHeig) {
    echo "You have finished HEIG-VD, congrats !<br>";
} elseif ($hasABachelorsDegree) {
    echo "You have another Bachelor's degree.<br>";
} else {
    echo "You are still a student.<br>";
}

// EXERCICE 9

/*
 * lorsque le serveur web reçoit une requête avec fichier .php, il l'envoie à l'interpréteur PHP qui génère un
 * fichier .html ; l'interpréteur le renvoie au serveur qui l'envoie à l'utilisateur
 */

// EXERCICE 10
$day = "Monday";
switch ($day) {
    case 'Monday':
    case "Tuesday":
    case "Wednesday":
    case "Thursday":
    case "Friday": echo "Weekday<br>"; break;
    case "Saturday":
    case "Sunday": echo "Weekend<br>"; break;
    default: echo "Unknown day<br>";
}

// EXERCICE 11
$temperature = 30;
if ($temperature > 20) {
    echo "It's hot !<br>";
} else if ($temperature > 15) {
    echo "It's cool.<br>";
} else {
    echo "It's cold.<br>";
}

// EXERCICE 12
$grade = 5;
switch ($grade) {
    case '1': echo "Did you even try ?<br>"; break;
    case '2': echo "You could have done better.<br>"; break;
    case '3': echo "Almost had it !<br>"; break;
    case '4': echo "You scraped by !<br>"; break;
    case '5': echo "Well done :)<br>"; break;
    case '6': echo "Woo, perfect !<br>"; break;
}

// EXERCICE 13

/*
 * une structure de contrôle conditionnelle permet de vérifer si une condition donnée est vraie ou non et
 * d'effectuer du code en conséquence
 */

// EXERCICE 14
const USERNAME = "admin";
const PASSWORD = "1234";
if (USERNAME == "admin" && PASSWORD == "1234") {
    echo "You are logged in<br>";
} else {
    echo "Login failed.<br>";
}

// EXERCICE 15
$number = 9;
if ($number % 3 == 0) {
    echo "Multiple of 3<br>";
} else {
    echo "Not a multiple of 3<br>";
}

// EXERCICE 16
$number = 15;
if ($number % 5 == 0 && $number % 3 == 0) {
    echo "Divisible by 3 and 5<br>";
} else if ($number % 5 == 0) {
    echo "Divisible by 5<br>";
} else if ($number % 3 == 0) {
    echo "Divisible by 3<br>";
} else {
    echo "Not divisible by 3 or 5<br>";
}

// EXERCICE 17
$stRochStudent = true;
$cheseauxStudent = false;
$comemStudent = true;
if ($stRochStudent && $comemStudent || $cheseauxStudent) {
    echo "You are an engineer<br>";
} else {
    echo "You are not an engineer<br>";
}

// EXERCICE 18

// same as 14

// EXERCICE 19

// same as 15

// EXERCICE 20

/*
 * regroupe tous les outils nécessaires à l'utilisation de PHP comme un serveur ou un interpréteur PHP
 */