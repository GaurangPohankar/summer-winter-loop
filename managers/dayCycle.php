<?php
require_once('SeasonManager.php'); // Include the SeasonManager class
require_once('./controllers/BirdController.php');
require_once('./controllers/FlowerController.php');
require_once('./controllers/RoosterController.php');
require_once('./controllers/DogController.php');
require_once('./constants/constants.php');
require_once('./utility/helper.php');

class DayCycle {
    private $birdController;
    private $flowerController;
    private $roosterController;
    private $dogController;
    private $seasonManager;

    public function __construct() {
        $this->birdController = new BirdController();
        $this->flowerController = new FlowerController();
        $this->roosterController = new RoosterController();
        $this->dogController = new DogController();
        $this->seasonManager = new SeasonManager();
    }

    public function start() {
        for ($i = 1; $i <= Constants::TOTAL_DAYS_TO_RUN; $i++) {
            $season = $this->seasonManager->getCurrentSeason();
            $this->printSunrise($season);

            $this->flowerController->wakeUp($season);
            $this->birdController->wakeUp($season);
            $this->roosterController->sing();
            $this->dogController->bark();

            for ($currentMinute = Constants::FULL_DAY_START; $currentMinute <= Constants::FULL_DAY_END; $currentMinute += 30) {
                if ($currentMinute < Constants::SUMMER_DAY_START) {
                    continue; // Skip printing time before sunrise and after sunset
                }

                $this->flowerController->changeColor($currentMinute, $season);

                if ($currentMinute == Constants::SUMMER_DAY_START && $season == "summer") {
                    $this->birdController->feed();
                }

                if ($currentMinute == Constants::SUMMER_DAY_END && $season == "summer") {
                    $this->printSunset();
                    $this->birdController->sleep();
                    $this->flowerController->sleep();
                    break; // Skip printing time after sunset
                }

                if ($currentMinute == Constants::WINTER_DAY_START && $season == "winter") {
                    $this->birdController->feed();
                }

                if ($currentMinute == Constants::WINTER_DAY_END && $season == "winter") {
                    $this->printSunset();
                    $this->birdController->sleep();
                    $this->flowerController->sleep();
                    break; // Skip printing time after sunset
                }

                $this->printTime($currentMinute);
            }

            $this->seasonManager->nextDay();
            echo "\n";
        }
    }

    private function printSunrise($season) {
        $time = ($season === "summer") ? "6:00am" : "7:00am";
        echo "Time: $time, the sunrise, We are in $season\n";
    }

    private function printSunset() {
        echo "Sun sets\n";
    }

    private function printTime($currentMinute) {
        echo "Time is " . formatTime($currentMinute) . "\n";
    }
}
?>
