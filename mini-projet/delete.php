<?php
require 'functions.php';

if (isset($_GET["id"])) {
    $petId = $_GET["id"];
    removePet($petId);
}
header("Location: index.php");
exit();