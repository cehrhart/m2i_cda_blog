<?php

/**
 * Classe mère des entités
 */
    class Entity
    {

        protected string $_strPrefixe = "";

        /**
         * Methode d'hydratation de l'objet
         * @param $arrData Tableau des données
         * @return void
         */
        public function hydrate($arrData){
            foreach ($arrData as $key => $value) {
                $strMethod = "set".ucfirst(str_replace($this->_strPrefixe, "", $key));
                if (method_exists($this, $strMethod)) {
                    $this->$strMethod($value);
                }
            }
        }



    }