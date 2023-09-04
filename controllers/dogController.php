<?php
require_once('./services/DogService.php');

class DogController {
    private $dogService;

    public function __construct() {
        $this->dogService = new DogService();
    }

    public function bark() {
        $this->dogService->bark();
    }
}
?>
