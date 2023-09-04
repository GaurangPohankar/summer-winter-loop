<?php

namespace Controllers;

use Entities\Bird;
use Entities\Flower;
use Entities\Dog;
use Entities\Rooster;
use Utility\Constants;

class DayController
{
    private $bird;
    private $flower;
    private $dog;
    private $rooster;
    private $seasonController;

    public function __construct(SeasonController $seasonController)
    {
        $this->bird = new Bird();
        $this->flower = new Flower();
        $this->dog = new Dog();
        $this->rooster = new Rooster();
        $this->seasonController = $seasonController;
    }

    public function simulateDay($dayNumber)
    {
        $currentSeason = $this->seasonController->getCurrentSeason();
        echo "Day $dayNumber: $currentSeason\n";

        // Full day's run
        for ($currentMinute = 0; $currentMinute <= 1440; $currentMinute += 30) {
            $this->simulateMinute($currentMinute);
        }

        // Change season
        $this->seasonController->changeSeason();
    }

    private function simulateMinute($currentMinute)
    {
        $this->checkBirdWakeUp($currentMinute);
        $currentSeason = $this->seasonController->getCurrentSeason();

        if ($currentSeason === "summer") {
            $this->simulateSummer($currentMinute);
        } else {
            $this->simulateWinter($currentMinute);
        }

        $this->checkFlowerColorChange($currentMinute);
    }

    private function checkBirdWakeUp($currentMinute)
    {
        if ($currentMinute == Constants::BIRD_WAKE_UP_TIME) {
            $this->bird->wakeUp();
            echo "Bird woke up\n";
        }
    }

    private function simulateSummer($currentMinute)
    {
        if ($currentMinute == Constants::SUMMER_START_TIME) {
            echo "Time is 6:00am, the sunrise. We are in summer\n";
            $this->rooster->crow();
            $this->dog->bark();
        }

        if ($this->bird->isAwake() && !$this->bird->hasFed()) {
            $this->bird->feed();
        }

        if ($currentMinute == Constants::SUMMER_END_TIME) {
            echo "Sun sets\n";
            $this->bird->sleep();
        }
    }


    private function simulateWinter($currentMinute)
    {
        if ($currentMinute == Constants::WINTER_START_TIME) {
            echo "Time is 7:00am, the sunrise. We are in winter\n";
            $this->rooster->crow();
            $this->dog->bark();
        }

        if ($this->bird->isAwake() && !$this->bird->hasFed()) {
            $this->bird->feed();
        }

        if ($currentMinute == Constants::WINTER_END_TIME) {
            echo "Sun sets\n";
            $this->bird->sleep();
        }
    }

    private function checkFlowerColorChange($currentMinute)
    {
        if ($currentMinute == Constants::FLOWER_COLOR_CHANGE_TIME) {
            $currentColor = $this->flower->getColor();
            $newColor = ($currentColor === "green") ? "red" : "blue";
            $this->flower->changeColor($newColor);
        } elseif ($currentMinute == Constants::FLOWER_COLOR_RESET_TIME) {
            $this->flower->resetColor();
        }
    }
}
