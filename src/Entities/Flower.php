<?php

namespace Entities;

class Flower
{
    private $color = "green";

    public function changeColor($newColor)
    {
        $this->color = $newColor;
        echo "Flower changes color to $newColor\n";
    }

    public function resetColor()
    {
        $this->color = "green";
        echo "Flower color resets to green\n";
    }

    public function getColor()
    {
        return $this->color;
    }
}

?>