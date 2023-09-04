<?php

namespace Entities;

class Season
{
    private $name;
    private $days = 0;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function changeSeason()
    {
        $this->days++;
        if ($this->name === "summer" && $this->days === 10) {
            $this->name = "winter";
            $this->days = 0;
        } elseif ($this->name === "winter" && $this->days === 12) {
            $this->name = "summer";
            $this->days = 0;
        }
    }

    public function getName()
    {
        return $this->name;
    }
}

?>