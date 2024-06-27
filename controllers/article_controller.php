<?php
    /**
     * Controller des articles
     */
    class ArticleCtrl extends Controller {
        /**
         * Page Accueil
         * @return void
         */
        public function index(){
            // Variables d'affichage
            $this->_arrData['strH1']	= "Accueil";
            $this->_arrData['strPar']	= "Page affichant les 4 derniers articles";

            // Variables de fonctionnement
            $this->_arrData['strPage'] 	= "index";

            require_once("models/article_model.php");
            $objModel   = new ArticleModel();
            $arrArticles = $objModel->findAll(4);

            $this->_arrData['arrArticlesToDisplay'] = $this->_arrayToObject($arrArticles);

            $this->_display("accueil");
        }

        /**
         * Page Blog
         * @return void
         */
        public function blog(){
            // Variables d'affichage
            $this->_arrData['strH1']	= "Blog";
            $this->_arrData['strPar']	= "Page affichant tous les articles, avec une zone de recherche sur les articles";

            // Variables de fonctionnement
            $this->_arrData['strPage']	= "blog";

            /*
             Directement à traiter via $_POST dans la vue
            $strKeywords	= $_POST['keywords']??"";
            $intPeriod		= $_POST['period']??0;
            $strDate		= $_POST['date']??"";
            $strStartDate	= $_POST['startdate']??"";
            $strEndDate		= $_POST['enddate']??"";
            $intAuthor		= $_POST['author']??0;*/

            require_once("models/article_model.php");
            $objModel   = new ArticleModel();
            $arrArticles = $objModel->findAll();

            // Le tableau d'objet => vue
            $this->_arrData['arrArticlesToDisplay'] = $this->_arrayToObject($arrArticles);
            $this->_display("blog");
        }

        /**
         * Page de création d'un article
         * @return void
         */
        public function add_article()
        {
            if (!isset($_SESSION['id']) || $_SESSION['id'] == '') {
                header("Location:index.php?controller=error&action=error_403");
            }
            // Variables d'affichage
            $this->_arrData['strH1']	= "Ajouter un article";
            $this->_arrData['strPar']	= "Page permettant d'ajouter un article";

            // Variables de fonctionnement
            $this->_arrData['strPage'] 	= "add_article";

            $this->_display("add_article");
        }

        private function _arrayToObject($arrArticles){
            $arrArticlesToDisplay = array();
            require_once("entities/article_entity.php");
            // Boucle fonctionnelle qui construit un tableau d'objets
            foreach($arrArticles as $arrDetArticle) {
                $objArticle = new Article();
                $objArticle->hydrate($arrDetArticle);
                $arrArticlesToDisplay[] = $objArticle;
            }
            return $arrArticlesToDisplay;
        }
    }