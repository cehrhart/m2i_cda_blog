<?php
    /**
     * Controller des erreurs
     */
    class ErrorCtrl{
        /**
         * Page 404
         * @return void
         */
        public function error_404(){
            // Variables d'affichage
            $strH1		= "Erreur 404";
            $strPar		= "Page non trouvée";

            // Variables de fonctionnement
            $strPage 	= "error_404";

            include("views/_partial/header.php");
            include("views/view_404.php");
            include("views/_partial/footer.php");
        }

        /**
         * Page 403
         * @return void
         */
        public function error_403(){
            // Variables d'affichage
            $strH1		= "Erreur 403";
            $strPar		= "Accès interdit";

            // Variables de fonctionnement
            $strPage 	= "error_403";

            include("views/_partial/header.php");
            include("views/view_403.php");
            include("views/_partial/footer.php");
        }

    }