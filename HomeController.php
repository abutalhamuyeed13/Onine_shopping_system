<?php


namespace App\classes;


class HomeController extends Action
{
//login
    static private function home(){
        include_once "view/home.php";
    }

    static function routeHome($data){
        if("home"==$data){
         self::home();
        }
    }
    static private function homereg(){
        include_once "register_action.php";
    }

    static function routerHomereg($data){
        if("routeHomereg"==$data){
            self::homereg();
        }
    }


    static private function admin(){
        include_once "view/admin.php";
    }
    static function routerAdmin($data){
        if("admin"==$data){
         self::admin();
        }
    }


    static private function reg(){
        include_once "view/registration.php";
    }
    static function routerReg($data){
        if("reg"==$data){
         self::reg();
        }
    }

    static private function seller(){
        include_once "view/seller.php";
    }
    static function routerSeller($data){
        if("seller"==$data){
            self::seller();
        }
    }




    static private function customer(){
        include_once "view/customer.php";
    }
    static function routerCustomer($data){
        if("customer"==$data){
            self::customer();
        }
    }
    static private function delivery(){
        include_once "view/delivery.php";
    }
    static function routerDelivery($data){
        if("delivery"==$data){
            self::delivery();
        }
    }
    static private function helpline(){
        include_once "view/helpline.php";
    }
    static function routerHelpline($data){
        if("helpline"==$data){
            self::helpline();
        }
    }

    static private function terms(){
        include_once "view/terms.php";
    }
    static function routerTerms($data){
        if("terms"==$data){
            self::terms();
        }
    }
}