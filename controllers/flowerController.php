<?php
require_once('./constants/constants.php');
require_once('./services/FlowerService.php');

class FlowerController {
    private $flowerService;

    public function __construct() {
        $this->flowerService = new FlowerService();
    }

    public function wakeUp($season) {
        $this->flowerService->wakeUpFlower($season);
    }

    public function sleep() {
        $this->flowerService->putFlowerToSleep();
    }

    public function changeColor($time, $season) {
        $this->flowerService->changeFlowerColor($time, $season);
    }
}
?>
