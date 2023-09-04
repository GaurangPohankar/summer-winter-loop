<?php

namespace Controllers;

use Entities\Season;

class SeasonController
{
    private $season;

    public function __construct()
    {
        $this->season = new Season("summer");
    }

    public function changeSeason()
    {
        $this->season->changeSeason();
    }

    public function getCurrentSeason()
    {
        return $this->season->getName();
    }
}

?>