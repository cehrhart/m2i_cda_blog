<?php
    /**
     * Controller des pages de contenu
     */
    class PageCtrl{
        /**
         * Page A propos
         * @return void
         */
        public function about(){
            // Variables d'affichage
            $strH1		= "A propos";
            $strPar		= "Page de contenu";

            // Variables de fonctionnement
            $strPage 	= "about";

            include("views/_partial/header.php");
            include("views/view_about.php");
            include("views/_partial/footer.php");
        }

        /**
         * Page Contact
         * @return void
         */
        public function contact(){
            // Variables d'affichage
            $strH1		= "Contact";
            $strPar		= "Page de contact";

            // Variables de fonctionnement
            $strPage 	= "contact";

            include("views/_partial/header.php");
            include("views/view_contact.php");
            include("views/_partial/footer.php");
        }

        /**
         * Page Mentions légales
         * @return void
         */
        public function mentions(){
            // Variables d'affichage
            $strH1		= "Mentions légales";
            $strPar		= "Page de contenu";

            // Variables de fonctionnement
            $strPage 	= "mentions";

            include("views/_partial/header.php");
            include("views/view_mentions.php");
            include("views/_partial/footer.php");
        }

    }