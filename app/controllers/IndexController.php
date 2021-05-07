<?php
namespace App\Controllers;

use \Core\{H,Controller,CompassApi};

class IndexController extends Controller
{
  public function index(){
    $email = '270304f1-d5d2-4ee7-a433-55c8ceb3b8cf@email.webhook.site';
    $url = 'https://webhook.site/270304f1-d5d2-4ee7-a433-55c8ceb3b8cf';
    CompassApi::configure(['debug' => true]);
    CompassApi::log($email,"register",array("Website" => $url,"Name" => "John Doe"));
  }

  
}

