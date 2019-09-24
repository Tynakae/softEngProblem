<?php

require_once "IRequest.php";
require_once './utility/Functions.php';

class Request implements IRequest
{

    function __construct()
    {
       $this->bootstrapSelf(); 
    }

    private function bootstrapSelf()
    {

        foreach($_SERVER as $key=>$value){
            $this->{
                $this->toCamelCase($key)
            }= $value;
        }

    }

    private function toCamelCase($string)
    {
        $result = strtolower($string);
        preg_match_all('/_[a-z]/', $result, $matches);
        foreach ($matches[0] as $match) {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }
        return $result;
    }


    public function getBody()
    {
        $function = new Functions();
        if ($this->requestMethod === "GET") {

            $function->retrieveDB();
        }

        if ($this->requestMethod == "POST") {
            $ips = json_decode(file_get_contents('php://input'));
            foreach ($ips as $ip=> $value) {

                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                   
                     $function->insertDB($ip);
                } else {
                    http_response_code(400);
                }

            };
        }
    }

  





}



?>