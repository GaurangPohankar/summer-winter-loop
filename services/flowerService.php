<?php
require_once('./constants/constants.php');

class FlowerService {
    private $color = "green";
    private $isAwake = false;

    public function wakeUpFlower($season) {
        $this->isAwake = true;

        if ($season == "winter") {
            echo "Flower woke up and color of petals are green\n";
            return true;
        }
        
        echo "Flower woke up and color of petals are {$this->color}\n";
    }

    public function putFlowerToSleep() {
        echo "Flower Sleeps\n";
    }

    public function changeFlowerColor($time, $season) 
    {
        if ($season == "winter") {
            echo "Petals are green \n";
            return true;
        }

        if ($this->isAwake && $season == "summer" ) 
        {
            if ($time == Constants::WINTER_DAY_START || $time == Constants::WINTER_DAY_START + 30) {
                $this->color = "red";
                echo "Petals are {$this->color}\n";
            } elseif ($time >= Constants::SUMMER_DAY_START + 120 && $time <= Constants::SUMMER_DAY_END) {
                $this->color = "blue";
                echo "Petals are {$this->color}\n";
            } else {
                $this->color = "green";
                echo "Petals are {$this->color}\n";
            }
        }
    }
}
?>
