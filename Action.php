<?php


namespace App\classes;


class Action
{
    static function index(){
      return header('Location: route.php?page=home');

    }

}