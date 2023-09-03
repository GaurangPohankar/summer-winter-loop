<?php 

$days=0;
$season="summer";
$totalDaysToRun=22;
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


for ($i = 1; $i <= $totalDaysToRun; $i++) {
    

    //full day's run starts
    
        for ($currentMinute = $startTime; $currentMinute <= $endTime; $currentMinute += 30) 
        {   
            //for bird character
            $is_bird_awake=FALSE;
            $is_bird_singing=FALSE;

            
            if( $season == "summer")
            {   
                if( $currentMinute == $birdWakeUpTime)
                {
                    print_r("Bird woke up \n");
                    $isBirdAwake=TRUE;
                }

                if( $currentMinute == $summerStartTime)
                {
                    print_r("Time is 6:00am, the sunrise. We in summer \n");
                }

            } 
            else
            {   
                if( $currentMinute == $birdWakeUpTime)
                {
                    print_r("Bird woke up \n");
                    $isBirdAwake=TRUE;
                }
                if( $currentMinute == $summerStartTime)
                {
                    print_r("Time is 7:00am, the sunrise. We in winter \n");
                }
            }



            if($isBirdAwake)
            {
                print_r("Bird Goes off to Feed on nectar \n");
                
                $totalNectorEaten = rand(5, 15);

                print_r("Bird eats nectar x".$totalNectorEaten." \n");
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