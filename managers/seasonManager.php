<?php
class SeasonManager {
    private $season = "summer";
    private $days = 0;

    public function getCurrentSeason() {
        return $this->season;
    }

    public function nextDay() {
        if ($this->season === "summer" && $this->days === Constants::SUMMER_DAYS) {
            $this->season = "winter";
            $this->days = 0;
        } elseif ($this->season === "winter" && $this->days === Constants::WINTER_DAYS) {
            $this->season = "summer";
            $this->days = 0;
        } else {
            $this->days++;
        }
    }
}
?>
