<?php
    $strCtrl    = $_GET['controller']??'article';
    $strMethod  = $_GET['action']??'index';

    // Mettre les tests de vérification sinon 404
    require_once("controllers/".$strCtrl."_controller.php");
    $strCtrlName    = $strCtrl."Ctrl";
    $objController  = new $strCtrlName();
    $objController->$strMethod();