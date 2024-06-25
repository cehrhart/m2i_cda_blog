<?php
/**
 * Entité qui représente la structure d'un article
 */

    class Article {

        private string $_title;
        private string $_img;
        private string $_content;
        private string $_createdate;
        private string $_author;


        /**
         * Methode d'hydratation de l'objet
         * @param $arrDetArticle Tableau des données
         * @return void
         */
        public function hydrate($arrDetArticle){
            /*$this->setTitle($arrDetArticle['article_title']);
            $this->setImg($arrDetArticle['article_img']);
            $this->setContent($arrDetArticle['article_content']);
            $this->setCreatedate($arrDetArticle['article_createdate']);
            $this->setAuthor($arrDetArticle['article_author']);*/

            foreach ($arrDetArticle as $key => $value) {
                $strMethod = "set".ucfirst(str_replace("article_", "", $key));
                if (method_exists($this, $strMethod)) {
                    $this->$strMethod($value);
                }
            }
        }

        /**
         * Getter du titre
         * @return string
         */
        public function getTitle(){
            return $this->_title;
        }

        /**
         * Setter du titre
         * @param $strTitle
         * @return void
         */
        public function setTitle($strTitle){
            $this->_title = $strTitle;
        }

        /**
         * Getter de l'image
         * @return string
         */
        public function getImg(){
            return $this->_img;
        }

        /**
         * Setter de l'image
         * @param $strImg
         * @return void
         */
        public function setImg($strImg){
            $this->_img = $strImg;
        }

        /**
         * Getter du content
         * @return string
         */
        public function getContent(){
            return $this->_content;
        }

        /**
         * Setter du content
         * @param $strContent
         * @return void
         */
        public function setContent($strContent){
            $this->_content = $strContent;
        }

        /**
         * Getter de la date de création
         * @return string
         */
        public function getCreatedate(){
            return $this->_createdate;
        }

        /**
         * Setter de la date de création
         * @param $strCreatedate
         * @return void
         */
        public function setCreatedate($strCreatedate){
            $this->_createdate = $strCreatedate;
        }

        /**
         * Getter de l'auteur
         * @return string
         */
        public function getAuthor(){
            return $this->_author;
        }

        /**
         * Setter de l'auteur
         * @param $strAuthor
         * @return void
         */
        public function setAuthor($strAuthor){
            $this->_author = $strAuthor;
        }


        /**
         * Méthode permettant de récupérer le résumé du contenu de l'article
         * @param int $intNbCar Nombre de caractères à afficher, par défaut 50
         * @return string Le résumé
         */
        public function getSummary(int $intNbCar = 50){
            $strSummary	= substr($this->_content, 0, $intNbCar);
            if (strlen($this->_content) > $intNbCar){
                $strSummary .= "...";
            }
            return $strSummary;
        }

        /**
         * Méthode permettant de récupérer la date de création selon un format
         * @param string $strFormat Format de la date, par défaut 'd/m/Y'
         * @return string La date formattée
         */
        public function getFormatCreateDate(string $strFormat = 'd/m/Y' ){
            $objDate 	= new DateTimeImmutable($this->_createdate);
            $strDate 	= $objDate->format($strFormat);
            return $strDate;
        }








    }