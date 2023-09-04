<?php
require_once('constants/constants.php');
require_once('utility/helper.php');
require_once('controllers/BirdController.php');
require_once('controllers/FlowerController.php');
require_once('controllers/DogController.php');
require_once('controllers/RoosterController.php');
require_once('managers/dayCycle.php');

$dayCycle = new DayCycle();
$dayCycle->start();
?>
