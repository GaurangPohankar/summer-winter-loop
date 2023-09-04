<?php
require_once('./constants/constants.php');

class BirdService {
    private $isAwake = false;
    private $hasFed = false;
    private $isSleeping = false;

    public function wakeUpBird($season) {
        $this->isAwake = true;
        echo "Bird woke up\n";
        if ($season == "winter") {
            echo "Bird sings\n";
        }
    }

    public function feedBird() 
    {
        if ($this->isAwake && !$this->hasFed) {
            echo "Bird Goes off to Feed on nectar\n";
            $totalNectarEaten = rand(Constants::MIN_NECTAR, Constants::MAX_NECTAR);
            echo "Bird eats nectar x$totalNectarEaten\n";
            if ($totalNectarEaten > 10) {
                $this->isSleeping = true;
                echo "Bird sleeps\n";
            }
            $this->hasFed = true;
        }
    }

    public function putBirdToSleep() {
        $this->isSleeping = true;
        $this->hasFed = false;
        echo "Bird Sleeps\n";
    }
}
?>
