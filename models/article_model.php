<?php
/**
 * Classe qui gère les échanges avec la base de données
 * Pour les articles
 */
    // Inclure le fichier de connexion PDO
    require("models/connexion.php");

    class ArticleModel extends ModelMother {

        /**
         * Constructeur de la classe
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Méthode qui permet de récupérer tous les articles (4 pour la page d'accueil)
         * @param int $intLimit Nombre limit de résultats
         * @return array La liste des articles
         */
        public function findAll(int $intLimit = 0, int $intOffset = 0):array{
            $strQuery		= "SELECT article_title, article_img, article_content, article_createdate,
                                    CONCAT(user_name, ' ', user_firstname) AS article_author
                                FROM articles
                                    INNER JOIN users ON article_creator = user_id
                                ORDER BY article_createdate DESC ";
            if ($intLimit > 0) {
                $strQuery .= " LIMIT ".$intLimit." OFFSET ".$intOffset;
            }
            //var_dump($strQuery);
            // On execute la requête et on demande tous les résultats
            return $this->_db->query($strQuery)->fetchAll();
        }


    }