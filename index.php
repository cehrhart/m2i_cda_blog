<?php
    session_start();

    /* Dispatcher  */
    $strCtrl    = $_GET['controller']??'article';
    $strMethod  = $_GET['action']??'index';

    // Mettre les tests de vérification sinon 404
    require_once("controllers/".$strCtrl."_controller.php");
    $strCtrlName    = ucfirst($strCtrl)."Ctrl";
    $objController  = new $strCtrlName();
    $objController->$strMethod();