<?php

require_once './utility/DbConnestion.php';

class Functions
{

    /**
     * Insets Ip address into db
     * 
     * @param string $ip is a valid ip address 
     */    
    public function insertDB($ip)
    {

        $dbconnection = new DbConnection();
        $dbcon = $dbconnection->dbcon();
        $query = "INSERT INTO ipaddress (successIP) Values ('$ip')";
        $runQuery = $dbcon->query($query);

        if ($runQuery) {

            http_response_code(201);
        } else {
            http_response_code(500);
        }
    }

    /**
     *  Retrieve value from db
     * 
     * @return string ip address
     */
    public function retrieveDB() 
    {
        $dbconnection = new DbConnection();
        $dbcon = $dbconnection->dbcon();

        $query = "SELECT successIP from ipaddress ORDER BY timestamp ASC limit 1";
        $exeQuery = $dbcon->query($query);
        $response = array();
        while ($row = $exeQuery->fetch_array()) {
            array_push($response, array("IP Adresss" => $row['successIP']));
        }

        echo json_encode($response);
    }

     
          
}
?>