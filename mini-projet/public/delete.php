<?php
require '../src/PetsManager.php';

$petsManager = new PetsManager();

if (isset($_GET["id"])) {
    $petId = $_GET["id"];

    $petsManager->removePet($petId);
}
header("Location: index.php");
exit();