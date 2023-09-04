<?php
require_once('./constants/constants.php');
require_once('./services/BirdService.php');

class BirdController {
    private $birdService;

    public function __construct() {
        $this->birdService = new BirdService();
    }

    public function wakeUp($season) {
        $this->birdService->wakeUpBird($season);
    }

    public function feed() {
        $this->birdService->feedBird();
    }

    public function sleep() {
        $this->birdService->putBirdToSleep();
    }
}
?>
