<?php

require_once __DIR__ . '/src/Entities/Bird.php';
require_once __DIR__ . '/src/Entities/Flower.php';
require_once __DIR__ . '/src/Entities/Dog.php';
require_once __DIR__ . '/src/Entities/Rooster.php';
require_once __DIR__ . '/src/Entities/Season.php';
require_once __DIR__ . '/src/Utility/Constants.php';
require_once __DIR__ . '/src/Controllers/DayController.php';
require_once __DIR__ . '/src/Controllers/SeasonController.php';

use Controllers\DayController;
use Controllers\SeasonController;

$seasonController = new SeasonController();
$dayController = new DayController($seasonController);

$totalDaysToRun = 22;

for ($i = 1; $i <= $totalDaysToRun; $i++) {
    $currentSeason = $seasonController->getCurrentSeason();
    echo "Day $i: $currentSeason\n";
    $dayController->simulateDay($i);
    $seasonController->changeSeason();
}
