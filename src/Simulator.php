<?php

use Entities\Bird;
use Entities\Flower;
use Entities\Dog;
use Entities\Rooster;
use Entities\Season;
use Utility\Constants;

class Simulator
{
    private $bird;
    private $flower;
    private $dog;
    private $rooster;
    private $season;

    public function __construct()
    {
        $this->bird = new Bird();
        $this->flower = new Flower();
        $this->dog = new Dog();
        $this->rooster = new Rooster();
        $this->season = new Season("summer");
    }

    public function run($totalDaysToRun)
    {
        for ($i = 1; $i <= $totalDaysToRun; $i++) {
            echo "Day $i: " . $this->season->getName() . "\n";

            // Full day's run
            for ($currentMinute = 0; $currentMinute <= 1440; $currentMinute += 30) {
                $this->simulateMinute($currentMinute);
            }

            // Change season
            $this->season->changeSeason();
        }
    }

    private function simulateMinute($currentMinute)
    {
        if ($currentMinute == Constants::BIRD_WAKE_UP_TIME) {
            $this->bird->wakeUp();
            echo "Bird woke up\n";
        }

        if ($currentMinute >= Constants::SUMMER_START_TIME && $currentMinute <= Constants::SUMMER_END_TIME) { // Summer
            
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
        else 
        {   
            // Winter
            if ($currentMinute >= Constants::WINTER_START_TIME && $currentMinute <= (Constants::BIRD_WAKE_UP_TIME + 60)) {
                $this->bird->sing();
                echo "Bird sings\n";
            }

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

        if ($currentMinute == Constants::WINTER_START_TIME) {
            $currentColor = $this->flower->getColor();
            if ($currentColor == "green") {
                $this->flower->changeColor("red");
            } elseif ($currentColor == "red") {
                $this->flower->changeColor("blue");
            }
        } elseif ($currentMinute == Constants::WINTER_END_TIME) {
            $this->flower->resetColor();
        }
    }
}

?>