<?php 

$days=0;
$season="summer";
$totalDaysToRun=22;
$num = 30;



for ($i = 1; $i <= $totalDaysToRun; $i++) {
    

    //full day's run starts
    
    if( $season == "summer")
    {
        print_r("Time is 6:00am, the sunrise. We in summer \n");
    }
    else
    {
        print_r("Time is 7:00am, the sunrise. We in winter \n");
    }

    //full day's run ends


    //setting the season changing logic starts
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