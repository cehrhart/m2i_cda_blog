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

            // Flag pour le WHERE
            $boolWhere      = false;

            $strQuery		= "SELECT article_title, article_img, article_content, article_createdate,
                                    CONCAT(user_name, ' ', user_firstname) AS article_author
                                FROM articles
                                    INNER JOIN users ON article_creator = user_id";

            // Recherche par mots clés
            /*if (isset($_POST['keywords'])){
                $strKeyword     = $_POST['keywords'];
            }else{
                $strKeyword     = "";
            }

            $strKeyword = (isset($_POST['keywords']))?$_POST['keywords']:"";
            */
            $strKeyword     = $_POST['keywords']??"";
            if ($strKeyword != '') {
                $strQuery .= " WHERE (article_title LIKE '%".$strKeyword."%' OR article_content LIKE '%".$strKeyword."%')";
                $boolWhere = true;
            }

            $intPeriod		= $_POST['period']??0;
            // Recherche par date exacte
            $strDate		= $_POST['date']??"";
            if ($intPeriod == 0 && $strDate != ''){
                $strQuery .= ($boolWhere)?" AND ":" WHERE ";
                $strQuery .= " article_createdate = '".$strDate."' ";
                $boolWhere = true;
            }

            // Recherche par période de date
            $strStartDate		= $_POST['startdate']??"";
            $strEndDate		    = $_POST['enddate']??"";
            if ($intPeriod == 1 && $strStartDate != '' && $strEndDate != ''){
                $strQuery .= ($boolWhere)?" AND ":" WHERE ";
                $strQuery .= " article_createdate BETWEEN '".$strStartDate."' AND '".$strEndDate."' ";
                $boolWhere = true;
            }

            // Recherche par auteur
            $intAuthor		= $_POST['author']??0;
            if ($intAuthor > 0){
                $strQuery .= ($boolWhere)?" AND ":" WHERE ";
                $strQuery .= " article_creator = ".$intAuthor;
            }

            $strQuery .= " ORDER BY article_createdate DESC ";
            if ($intLimit > 0) {
                $strQuery .= " LIMIT ".$intLimit." OFFSET ".$intOffset;
            }
            //var_dump($strQuery);
            // On execute la requête et on demande tous les résultats
            return $this->_db->query($strQuery)->fetchAll();
        }


    }