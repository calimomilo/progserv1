<?php
$variable1 = "Bonjour";
$variable2 = "$variable1 tout le monde !";
$variable3 = $variable1 . " " .  $variable2;
$variable4 = "\$variable3 contient \"$variable3\"";

echo $variable1;
echo "<br>";
echo $variable2;
echo "<br>";
echo $variable3;
echo "<br>";
echo $variable4;

echo "<br><br>";

function isLongerThan4($string){
    return strlen($string) > 4;
}

echo isLongerThan4("Non");
echo isLongerThan4("String");

echo "<br><br>";


$fruitsEtLegumes = [
    'fruits' => ['Pomme', 'Poire', 'Banane'],
    'legumes' => ['Carotte', 'Tomate', 'Salade']
];


for($i = 0; $i < 3; $i++) {
    echo $fruitsEtLegumes['fruits'][$i] . "<br>";
}

echo "<br><br>";

class Room
{

    private $surfaceInSquareMeters;
    private $numberOfLights;

    public function __construct(
        $surfaceInSquareMeters,
        $numberOfLights
    )
    {
        $this->surfaceInSquareMeters = $surfaceInSquareMeters;
        $this->numberOfLights = $numberOfLights;
    }

    public function numberOfLightsPerSquareMeters()
    {
        if ($this->numberOfLights <= 0) {
            return 0 . "x";
        } else {
            return $this->numberOfLights / $this->surfaceInSquareMeters;
        }
    }
}

$room1 = new Room(25, 3);
echo $room1->numberOfLightsPerSquareMeters();