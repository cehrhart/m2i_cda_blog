<?php
    /**
     * Controller des articles
     */
    class ArticleCtrl{
        /**
         * Page Accueil
         * @return void
         */
        public function index(){
            // Variables d'affichage
            $strH1		= "Accueil";
            $strPar		= "Page affichant les 4 derniers articles";

            // Variables de fonctionnement
            $strPage 	= "index";

            require("views/_partial/header.php");

            require_once("models/article_model.php");
            $objModel   = new ArticleModel();
            $arrArticles = $objModel->findAll(4);

            include("views/view_accueil.php");

            include("views/_partial/footer.php");
        }

        /**
         * Page Blog
         * @return void
         */
        public function blog(){
            // Variables d'affichage
            $strH1		= "Blog";
            $strPar		= "Page affichant tous les articles, avec une zone de recherche sur les articles";

            // Variables de fonctionnement
            $strPage 	= "blog";

            include("views/_partial/header.php");

            //var_dump($_POST);

            $strKeywords	= $_POST['keywords']??"";
            $intPeriod		= $_POST['period']??0;
            $strDate		= $_POST['date']??"";
            $strStartDate	= $_POST['startdate']??"";
            $strEndDate		= $_POST['enddate']??"";
            $intAuthor		= $_POST['author']??0;

            require_once("models/article_model.php");
            $objModel   = new ArticleModel();
            $arrArticles = $objModel->findAll();

            include("views/view_blog.php");

            include("views/_partial/footer.php");
        }

        /**
         * Page de création d'un article
         * @return void
         */
        public function add_article()
        {
            // Variables d'affichage
            $strH1		= "Ajouter un article";
            $strPar		= "Page permettant d'ajouter un article";

            // Variables de fonctionnement
            $strPage 	= "add_article";

            include("views/_partial/header.php");
            include("views/view_add_article.php");

            include("views/_partial/footer.php");
        }
    }