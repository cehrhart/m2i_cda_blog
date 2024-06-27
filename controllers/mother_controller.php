<?php

    class Controller{

        protected $_arrData = array();

        protected function _display($strView){
            /*$strH1      = $this->_arrData['strH1'];
            $strPar     = $this->_arrData['strPar'];
            $strPage    = $this->_arrData['strPage'];*/

            foreach($this->_arrData as $key=>$value){
                $$key     = $value;
            }

            include("views/_partial/header.php");
            include("views/view_".$strView.".php");
            include("views/_partial/footer.php");
        }
    }