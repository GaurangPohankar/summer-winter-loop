<?php
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
?>
