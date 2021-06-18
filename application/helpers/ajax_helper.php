<?php
defined('BASEPATH') or exit('No direct script access allowed');

function response_ajax($result)
{
    header('Access-Control-Allow-Origin: *'); //for allow * 
    header('Access-Control-Allow-Headers: *'); //for allow * 
    header('Access-Control-Allow-Methods: GET, POST'); //method GET, POST allowed
    header('Content-Type: application/json');
    echo json_encode([
        "data" => [
            "result" => $result
        ]
    ]);
    die;
}
