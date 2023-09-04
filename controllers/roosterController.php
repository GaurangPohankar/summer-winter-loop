<?php
require_once('./services/RoosterService.php');

class RoosterController {
    private $roosterService;

    public function __construct() {
        $this->roosterService = new RoosterService();
    }

    public function sing() {
        $this->roosterService->sing();
    }
}
?>
