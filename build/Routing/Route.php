<?php

class Route {

    private $dataRoute;

    public function __construct() {
        $this->dataRoute = [];
    }

    public function __callStatic($method, $args) {
        (new self)->make($method, $args);
    }

    public function make($method, $args) {
        $this->dataRoute[] = $method;
    }

    function run() {
        return $this->dataRoute;
    }

}