<?php

class errorController {

    public function index() {
        require_once 'views/layout/header.php';
        require_once 'views/layout/error404.php';
        require_once('views/layout/footer-sticky.php');
    }
}
