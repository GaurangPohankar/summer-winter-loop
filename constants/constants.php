<?php
class Constants {
    const SUMMER_DAYS = 10;
    const WINTER_DAYS = 12;
    const TOTAL_DAYS_TO_RUN = self::SUMMER_DAYS + self::WINTER_DAYS;

    const MIN_NECTAR = 5;
    const MAX_NECTAR = 15;

    const FULL_DAY_START = 0;
    const FULL_DAY_END = 1440;

    const SUMMER_DAY_START = 360; // 6 am
    const SUMMER_DAY_END = 1200; // 8 pm

    const WINTER_DAY_START = 420; // 7 am
    const WINTER_DAY_END = 1140; // 7 pm;

    const BIRD_WAKE_UP_TIME = self::SUMMER_DAY_START;
}
?>
