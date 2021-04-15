<?php
namespace Core;

use Core\Application;

class Controller extends Application {
 
  public function jsonResp($resp) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);
    echo \json_encode($resp);
    exit;
  }
}