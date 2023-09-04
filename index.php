<?php

$days = 0;
$season = "summer";
$totalDaysToRun = 22; // 10 summer days + 12 winter days
$num = 30;

# Full day
$startTime = 0; // 0 am
$endTime = 1440; // 12 pm

# Summer day
$summerStartTime = 360; // 6 am
$summerEndTime = 1200; // 8 pm

# Winter day
$winterStartTime = 420; // 7 am
$winterEndTime = 1140; // 7 pm

$birdWakeUpTime = 360;


function formatTime($minutes) {
    $hour = floor($minutes / 60);
    $minute = $minutes % 60;
    $period = ($hour < 12) ? 'AM' : 'PM';
    if ($hour == 0) {
        $hour = 12;
    }
    if ($hour > 12) {
        $hour -= 12;
    }
    return "$hour:$minute $period";
}

class Bird {
    public $isAwake = false;
    public $hasFed = false;
    public $isSleeping = false;
    public $season = "summer";

    public function wakeUp($season) {
        $this->isAwake = true;
        echo "Bird woke up\n";
        if ($season == "winter") {
            echo "Bird sings\n";
        }
    }

    public function feed() {
        if ($this->isAwake && !$this->hasFed) {
            echo "Bird Goes off to Feed on nectar\n";
            $totalNectarEaten = rand(5, 15);
            echo "Bird eats nectar x$totalNectarEaten\n";
            if ($totalNectarEaten > 10) {
                $this->isSleeping = true;
                echo "Bird sleeps\n";
            }
            $this->hasFed = true;
        }
    }

    public function sleep() {
        $this->isSleeping = true;
        $this->hasFed = false;
        echo "Bird Sleeps\n";
    }
}

class Flower {
    public $color = "green";
    public $isAwake = false;

    public function wakeUp() {
        $this->isAwake = true;
        echo "Flower woke up and color of petals are {$this->color}\n";
    }

    public function changeColor($time, $season) 
    {   
        if( $season == "winter" )
        {
            echo "Petals are {$this->color}\n";
            return True;
        }
        
        if ($this->isAwake) 
        {
            if ( $time == 420 || $time == 450 ) {
                $this->color = "red";
                echo "Petals are {$this->color}\n";
            } elseif ($time >= 480 && $time <= 1110  ) {
                $this->color = "blue";
                echo "Petals are {$this->color}\n";
            } else {
                $this->color = "green";
                echo "Petals are {$this->color}\n";
            }
        }
    }
}

class Rooster {
    public function sing() {
        echo "Rooster sings\n";
    }
}

class Dog {
    public function bark() {
        echo "Dog barks\n";
    }
}

$bird = new Bird();
$flower = new Flower();
$rooster = new Rooster();
$dog = new Dog();

for ($i = 1; $i <= $totalDaysToRun; $i++) {

    if ($season == "summer") {
        echo "Time: 6:00am, the sunrise, We are in $season\n";
    } else {
        echo "Time: 7:00am, the sunrise, We are in $season\n";
    }

    $flower->wakeUp();
    $bird->wakeUp($season);
    $rooster->sing();
    $dog->bark();

    for ($currentMinute = $startTime; $currentMinute <= $endTime; $currentMinute += 30) 
    {
        if ($currentMinute < $summerStartTime) {
            continue; // Skip printing time before sunrise and after sunset
        }

        $flower->changeColor($currentMinute, $season);

        if ($currentMinute == $summerStartTime && $season == "summer") {
            $bird->feed();
        }

        if ($currentMinute == $summerEndTime && $season == "summer")
        {
            echo "Sun sets\n";
            $bird->sleep();
            echo "Flower Sleeps\n";
            break; // Skip printing time after sunset
        }

        if ($currentMinute == $winterStartTime && $season == "winter") {
            $bird->feed();
        }

        if ($currentMinute == $winterEndTime && $season == "winter") {
            echo "Sun sets\n";
            $bird->sleep();
            echo "Flower Sleeps\n";
            break; // Skip printing time after sunset
        }

        echo "Time is " . formatTime($currentMinute) . "\n";
    }

    $days++;

    if ($season === "summer" && $days === 10) {
        $season = "winter";
        $days = 0;
    } elseif ($season === "winter" && $days === 12) {
        $season = "summer";
        $days = 0;
    }
    echo "\n";
}
?>
