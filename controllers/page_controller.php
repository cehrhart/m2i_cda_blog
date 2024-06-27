<?php
    /**
     * Controller des pages de contenu
     */
    class PageCtrl extends Controller {
        /**
         * Page A propos
         * @return void
         */
        public function about(){
            // Variables d'affichage
            $this->_arrData['strH1']	= "A propos";
            $this->_arrData['strPar']	= "Page de contenu";

            // Variables de fonctionnement
            $this->_arrData['strPage'] 	= "about";

            $this->_display("about");
            /*include("views/_partial/header.php");
            include("views/view_about.php");
            include("views/_partial/footer.php");*/
        }

        /**
         * Page Contact
         * @return void
         */
        public function contact(){
            // Variables d'affichage
            $this->_arrData['strH1']	= "Contact";
            $this->_arrData['strPar']	= "Page de contact";

            // Variables de fonctionnement
            $this->_arrData['strPage'] 	= "contact";

            $this->_display("contact");
        }

        /**
         * Page Mentions légales
         * @return void
         */
        public function mentions(){
            // Variables d'affichage
            $this->_arrData['strH1']	= "Mentions légales";
            $this->_arrData['strPar']	= "Page de contenu";

            // Variables de fonctionnement
            $this->_arrData['strPage'] 	= "mentions";

            $this->_display("mentions");
        }

    }