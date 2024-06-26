<?php
/**
 * Classe qui gère les échanges avec la base de données
 * Pour les utilisateurs
 */
    // Inclure le fichier de connexion PDO
    require("models/connexion.php");

    class UserModel extends ModelMother {

        /**
         * Constructeur de la classe
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Méthode de recherche d'un utilisateur par son adresse mail
         * @param string $strMail Mail à rechercher
         * @return array|bool Tableau de l'utilisateur ou false si non trouvé
         */
        public function getByMail(string $strMail):array|bool{
            $strQuery	= "SELECT user_mail
							FROM users 
							WHERE user_mail = :mail;";
            $strRqPrep	= $this->_db->prepare($strQuery);
            $strRqPrep->bindValue(":mail", $strMail, PDO::PARAM_STR);
            $strRqPrep->execute();
            return $strRqPrep->fetch();
        }

        public function findByMailAndPwd():array|bool{
            // Vérifie l'utilisateur par son mail
            $strQuery	= "SELECT user_id, user_firstname, user_pwd
							FROM users 
							WHERE user_mail = :mail; ";
                                //AND user_pwd = :pass;";
            $strRqPrep	= $this->_db->prepare($strQuery);
            $strRqPrep->bindValue(":mail", $_POST['mail'], PDO::PARAM_STR);
            //$strRqPrep->bindValue(":pass", $_POST['password'], PDO::PARAM_STR);
            $strRqPrep->execute();
            $arrUser = $strRqPrep->fetch();

            // Vérification du mot de passe
            if ($arrUser !== false && password_verify($_POST['password'], $arrUser['user_pwd'])) {
                unset($arrUser['user_pwd']);
                return $arrUser;
            }
            return false;
        }

        /**
         * Méthode qui permet d'ajouter un utilisateur en bdd
         * @param object $objUser L'utilisateur
         * @return bool Est-ce que l'ajout s'est bien passé
         */
        public function insert(object $objUser):bool{
            // Ajouter les infos en BDD
            /*$strQuery		= "INSERT INTO users (user_name, user_firstname, user_mail, user_pwd)
                                    VALUES ('".$objUser->getName()."', '".$objUser->getFirstname()."', '".$objUser->getMail()."', '".$objUser->getPwd()."');";
            $this->_db->exec($strQuery);*/
            $strQuery		= "INSERT INTO users (user_name, user_firstname, user_mail, user_pwd)
                                VALUES (:name, :firstname, :mail, :pwd) ";
            $strRqPrep	= $this->_db->prepare($strQuery);
            $strRqPrep->bindValue(":name", $objUser->getName(), PDO::PARAM_STR);
            $strRqPrep->bindValue(":firstname", $objUser->getFirstname(), PDO::PARAM_STR);
            $strRqPrep->bindValue(":mail", $objUser->getMail(), PDO::PARAM_STR);
            $strRqPrep->bindValue(":pwd", $objUser->getPwdHash(), PDO::PARAM_STR);
            return $strRqPrep->execute();
        }


    }