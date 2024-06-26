<?php
/**
 * Entité qui représente la structure d'un article
 */

    require_once('entities/mother_entity.php');
    class Article extends Entity {

        private string $_title;
        private string $_img;
        private string $_content;
        private string $_createdate;
        private string $_author;

        protected string $_strPrefixe = "article_";

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