<?php

class Authentication extends DB
{
    private $con;

    public function __construct()
    {
        $this->con = $this->connect();
    }

    public function login() {
        // echo 'hi';
    }


}