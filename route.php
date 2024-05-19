<?php
require_once "vendor/autoload.php";


use App\classes\HomeController;
include_once "view/template-parts/header.php";

HomeController::routeHome($_GET['page']);

HomeController::routerAdmin($_GET['page']);
HomeController::routerReg($_GET['page']);
HomeController::routerSeller($_GET['page']);
HomeController::routerCustomer($_GET['page']);
HomeController::routerDelivery($_GET['page']);
HomeController::routerHelpline($_GET['page']);
HomeController::routerHomereg($_GET['page']);
HomeController::routerTerms($_GET['page']);