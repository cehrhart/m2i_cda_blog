<?php
/**
 * Entité qui représente la structure d'un utilisateur
 */
    require_once('entities/mother_entity.php');
    class User extends Entity {

        private string $_name = '';
        private string $_firstname = '';
        private string $_mail = '';
        private string $_pwd;

        protected string $_strPrefixe = "user_";

        /**
         * Getter du nom
         * @return string
         */
        public function getName(){
            return $this->_name;
        }

        /**
         * Setter du nom
         * @param $strName
         * @return void
         */
        public function setName($strName){
            $this->_name = trim($strName);
        }

        /**
         * Getter du prénom
         * @return string
         */
        public function getFirstname(){
            return $this->_firstname;
        }

        /**
         * Setter du prénom
         * @param $strFirstname
         * @return void
         */
        public function setFirstname($strFirstname){
            $this->_firstname = trim($strFirstname);
        }

        /**
         * Getter du mail
         * @return string
         */
        public function getMail(){
            return $this->_mail;
        }

        /**
         * Setter du mail
         * @param $strMail
         * @return void
         */
        public function setMail($strMail){
            $this->_mail = strtolower(trim($strMail));
        }

        /**
         * Getter du mot de passe
         * @return string
         */
        public function getPwd(){
            return $this->_pwd;
        }

        /**
         * Setter du mot de passe
         * @param $strPwd
         * @return void
         */
        public function setPwd($strPwd){
            $this->_pwd = $strPwd;
        }

    }