<?php

// EXERCICE 1

function greet($name)
{
    echo "Hello, $name!";
}

greet("Camilo");
echo "<br>";

// EXERCICE 2

function square($number)
{
    return $number * $number;
}

echo square(4);
echo "<br>";

// EXERCICE 3

function multiply($a, $b)
{
    return $a * $b;
}

echo multiply(6, 7);
echo "<br>";

// EXERCICE 4

function divide($a, $b)
{
    if ($b == 0) {
        return "Division by zero not allowed.";
    } else {
        return $a / $b;
    }
}

echo divide(15, 3);
echo "<br>";

// EXERCICE 5

function absoluteValue($number)
{
    if ($number < 0) {
        return -$number;
    } else {
        return $number;
    }
}

echo absoluteValue(-15);
echo "<br>";

// EXERCICE 6

function maxOfTwo($a, $b)
{
    if ($a > $b) {
        return $a;
    } else {
        return $b;
    }
}

echo maxOfTwo(12, 8);
echo "<br>";

// EXERCICE 7

function isEven($number)
{
    return $number % 2 == 0;
}

if (isEven(10)) {
    echo "Even";
} else {
    echo "Odd";
}
echo "<br>";

// EXERCICE 8

function grade($points, $total)
{
    return $points / $total * 5.0 + 1.0;
}

$grade = grade(47, 66);
echo $grade;
echo "<br>";

// EXERCICE 9

function isPassing($grade)
{
    return $grade >= 4.0;
}

if (isPassing($grade)) {
    echo "Passing";
} else {
    echo "Failing";
}
echo "<br>";

// EXERCICE 10

function isLeapYear($year)
{
    return $year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0);
}

if (isLeapYear(2025)) {
    echo "Bissextile";
} else {
    echo "Non bissextile";
}
echo "<br>";

// EXERCICE 11

echo round(4.5606060606061, 1);
echo "<br>";

// EXERCICE 12

echo ceil(4.5606060606061);
echo "<br>";

// EXERCICE 13

echo floor(4.5606060606061);
echo "<br>";

// EXERCICE 14

function absoluteValue2($number)
{
    return abs($number);
}
echo absoluteValue2(-15);
echo "<br>";

// EXERCICE 15

echo pow(2, 8);
echo "<br>";

// EXERCICE 16

echo str_replace("world", "PHP", "Hello, world!");
echo "<br>";

// EXERCICE 17

echo str_word_count("Hello, world!");
echo "<br>";

// EXERCICE 18

if (str_starts_with("Hello, world!", "Hello")) {
    echo "true";
} else {
    echo "false";
}
echo "<br>";

// EXERCICE 19

echo str_repeat("Hello, world!", 3);
echo "<br>";

// EXERCICE 20

echo strpos("Hello, world!", "world");
echo "<br>";

// EXERCICE 21

function isStringOrInteger($variable)
{
    if (is_string($variable)) {
        return "String";
    } elseif (is_int($variable)) {
        return "Integer";
    } else {
        return "Unknown";
    }
}

$variable1 = "Hello, world!";
$variable2 = 42;
$variable3 = 3.14;
$variable4 = true;

echo isStringOrInteger($variable1);
echo "<br>";
echo isStringOrInteger($variable2);
echo "<br>";
echo isStringOrInteger($variable3);
echo "<br>";
echo isStringOrInteger($variable4);
echo "<br>";

// EXERCICE 22

function isSetAndNotEmpty($variable)
{
    if (isset($variable)) {
        if (empty($variable)) {
            return "Set and empty";
        } else {
            return "Set and not empty";
        }
    } else {
        return "Not set";
    }
}

$variable5 = "Hello, world!";
$variable6 = "";
$variable7 = 42;
$variable8 = null;

echo isSetAndNotEmpty($variable5);
echo "<br>";
echo isSetAndNotEmpty($variable6);
echo "<br>";
echo isSetAndNotEmpty($variable7);
echo "<br>";
echo isSetAndNotEmpty($variable8);
echo "<br>";

// EXERCICE 23

function truncate($string, $length)
{
    if (strlen($string) > $length) {
        return substr($string, 0, $length) . "...";
    } else {
        return $string;
    }
}

$string = "Hello, world!";
$length = 5;

echo truncate($string, $length);
echo "<br>";

// EXERCICE 24

function debug($variable)
{
    var_dump($variable);
}

$variable9 = "Hello, world!";
$variable10 = 42;
$variable11 = 3.14;
$variable12 = true;

debug($variable9);
echo "<br>";
debug($variable10);
echo "<br>";
debug($variable11);
echo "<br>";
debug($variable12);
echo "<br>";

// EXERCICE 25

function isDivisibleBy($a, $b)
{
    return $a % $b == 0;
}

if (isDivisibleBy(10, 3)) {
    echo "true";
} else {
    echo "false";
}
echo "<br>";

// EXERCICE 26

function factorial($number)
{
    if ($number == 0) {
        return 1;
    }
    return $number * factorial($number - 1);
}

echo factorial(0);
echo "<br>";
echo factorial(1);
echo "<br>";
echo factorial(2);
echo "<br>";
echo factorial(3);
echo "<br>";
echo factorial(4);
echo "<br>";
echo factorial(5);
echo "<br>";