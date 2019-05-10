<?php

namespace Rifus\Http;

require_once "IRequest.php";

use Rifus\Http\IRequest;

class Request implements IRequest {

    public function __construct() {
        $this->capture();
    }

    public function capture() {

        foreach($_SERVER as $key => $val) {
            $this->{strtolower($key)} = $val;
        }

    }

    public function get() {

    }

}