<?php 

$days=0;
$season="summer";
$totalDaysToRun=13;
$num = 30;

#full day
$startTime= 0; //0am
$endTime = 1440; //12pm

#summer day
$summerStartTime= 360; //6am
$summerEndTime = 1200; //8pm

#winter day
$winterStartTime= 420; //7am
$winterEndTime = 1140; //7pm

$birdWakeUpTime=360;

// Initialize the flower color as green during summer
$flowerColor = "green"; // Initialize the flower color as green during summer
$flowerColorChangeTime = 420; // 7 AM in minutes, when the flower changes color
$flowerColorResetTime = 480; 

for ($i = 1; $i <= $totalDaysToRun; $i++) {
    

    //full day's run starts

        //for bird character
        $isBirdAwake=FALSE;
        $isBirdSinging=FALSE;
        $hasBirdFed = FALSE;


        for ($currentMinute = $startTime; $currentMinute <= $endTime; $currentMinute += 30) 
        {   
            
            if( $season == "summer")
            {   
                

                if( $currentMinute == $summerStartTime)
                {
                    print_r("Time is 6:00am, the sunrise. We are in summer \n");
                }
                if( $currentMinute == $birdWakeUpTime)
                {
                    print_r("Bird woke up \n");
                    $isBirdAwake=TRUE;
                }
                if( $currentMinute == $summerStartTime)
                {
                    print_r("Rooster sings\n");
                    print_r("Dog barks\n");
                }

                if ($isBirdAwake && $hasBirdFed==FALSE) 
                {
                    print_r("Bird goes off to feed on nectar \n");
            
                    $totalNectarEaten = rand(5, 15);
            
                    print_r("Bird eats nectar x" . $totalNectarEaten . " \n");
            
                    if ($totalNectarEaten > 10) {
                        print_r("Bird sleeps \n");
                    }
                    $hasBirdFed = TRUE;
                }

                print_r("Time is ".$currentMinute. " \n");
                
                // Check if it's time for the flower to change color
                if ($currentMinute == $flowerColorChangeTime) {
                    print_r("Flower changes color to red \n");
                    $flowerColor = "red";
                } elseif ($currentMinute == $flowerColorResetTime) {
                    print_r("Flower color resets to green \n");
                    $flowerColor = "green";
                } elseif ($currentMinute > $flowerColorChangeTime && $currentMinute < $flowerColorResetTime) {
                    if ($flowerColor == "red") {
                        print_r("Flower changes color to blue \n");
                        $flowerColor = "blue";
                    }
                }

                
                if($currentMinute == $summerEndTime)
                {   
                    print_r("Sun sets \n");
                    print_r("Bird sleeps \n");
                }


            } 
            //else condition represents the winter season
            else
            {   

                if( $currentMinute == $birdWakeUpTime)
                {
                    print_r("Bird woke up \n");
                    $isBirdAwake=TRUE;
                }

                if ($currentMinute >= $winterStartTime && $currentMinute <= ($birdWakeUpTime + 60)) {
                    print_r("Bird sings \n");
                }

                if( $currentMinute == $winterStartTime)
                {
                    print_r("Time is 7:00am, the sunrise. We in winter \n");
                }
                
                if( $currentMinute == $winterStartTime)
                {
                    print_r("Rooster sings\n");
                    print_r("Dog barks\n");
                }

                if ($isBirdAwake && $hasBirdFed==FALSE) {
                    print_r("Bird Goes off to Feed on nectar \n");
            
                    $totalNectarEaten = rand(5, 15);
            
                    print_r("Bird eats nectar x" . $totalNectarEaten . " \n");
            
                    if ($totalNectarEaten > 10) {
                        print_r("Bird sleeps \n");
                    }
                    $hasBirdFed = TRUE;
                }

                print_r("Time is ".$currentMinute . " \n");

                if($currentMinute == $winterEndTime)
                {   
                    print_r("Sun sets \n");
                    print_r("Bird sleeps \n");
                }

            }



            



        }
        

    //full day's run ends


    //setting the season changing logic starts
    //echo "Day " . ($days + 1) . ": $season\n";
    $days++;
    if ($season === "summer" && $days === 10) {
        $season = "winter";
        $days = 0; 
    } elseif ($season === "winter" && $days === 12) {
        $season = "summer";
        $days = 0; 
    }
    //setting the season changing logic ends
    

}



?>