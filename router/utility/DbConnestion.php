<?php

class DbConnection
{

public function __construct()
{
    
}
function dbcon()
{
$username = 'root';
$password = '';
$host = 'localhost';
$db = 'ips';

$con = new mysqli($host, $username, $password, $db) or exit($con->error);

return $con;

}

}