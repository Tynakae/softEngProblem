<?php

class DbConnection
{

    public function __construct()
    {
    
    }

    
    public function dbcon()
    {
        $username = 'root';
        $password = '';
        $host = 'localhost';
        $db = 'validips';

        $con = new mysqli($host, $username, $password, $db) or exit($con->error);

        return $con;

    }

}