<?php

class HelloService {

    private $name;

    function __construct($name) {
        $this->name = $name;
    }

    public function getHello() {
        return "Hello $this->name! :)";
    }
}
