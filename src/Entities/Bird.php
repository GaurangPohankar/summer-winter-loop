<?php

namespace Entities;

class Bird
{
    private $isAwake = false;
    private $isSinging = false;
    private $fed = false;

    public function wakeUp()
    {
        $this->isAwake = true;
    }

    public function sing()
    {
        $this->isSinging = true;
    }

    public function feed()
    {
        if (!$this->hasFed()) {
            $totalNectarEaten = rand(5, 15);
            echo "Bird goes off to feed on nectar\n";
            echo "Bird eats nectar x$totalNectarEaten\n";
            if ($totalNectarEaten > 10) {
                echo "Bird sleeps\n";
            }
            $this->fed = true;
        }
    }

    public function sleep()
    {
        $this->isAwake = false;
        $this->isSinging = false;
        $this->fed = false;
    }

    public function isAwake()
    {
        return $this->isAwake;
    }

    public function hasFed()
    {
        return $this->fed;
    }
}

?>