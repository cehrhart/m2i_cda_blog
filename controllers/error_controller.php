<?php
    /**
     * Controller des erreurs
     */
    class ErrorCtrl extends Controller {
        /**
         * Page 404
         * @return void
         */
        public function error_404(){
            // Variables d'affichage
            $this->_arrData['strH1']	= "Erreur 404";
            $this->_arrData['strPar']	= "Page non trouvée";

            // Variables de fonctionnement
            $this->_arrData['strPage']	= "error_404";

            $this->_display("404");
        }

        /**
         * Page 403
         * @return void
         */
        public function error_403(){
            // Variables d'affichage
            $this->_arrData['strH1']	= "Erreur 403";
            $this->_arrData['strPar']	= "Accès interdit";

            // Variables de fonctionnement
            $this->_arrData['strPage'] 	= "error_403";

            $this->_display("403");
        }

    }