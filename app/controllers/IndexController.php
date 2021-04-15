<?php
namespace App\Controllers;

use \Core\{H,Controller,CompassApi};

class IndexController extends Controller
{
  public function index(){
    
    $obj = CompassApi::configure();
    H::dnd($obj);

    return 'Hello Users';
  }

  
}

