<?php

class ByeService {

    private $name;

    function __construct($name) {
        $this->name = $name;
    }

    public function getBye() {
        return "Bye $this->name! :(";
    }
}
