<div class="row mb-2">
    <?php
    if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
        ?>
        <p><a alt="Ajouter un article" href="index.php?controller=article&action=add_article">Ajouter un article</a></p>
        <?php
    }
    ?>

    <?php
    require_once("entities/article_entity.php");
    // Parcourir le tableau des articles
    foreach($arrArticles as $arrDetArticle){
        $objArticle = new Article();
        $objArticle->hydrate($arrDetArticle);
        /*$objArticle->setTitle($arrDetArticle['article_title']);
        $objArticle->setImg($arrDetArticle['article_img']);
        $objArticle->setContent($arrDetArticle['article_content']);
        $objArticle->setCreatedate($arrDetArticle['article_createdate']);
        $objArticle->setAuthor($arrDetArticle['article_author']);*/

        // Affichage d'un article
        include("_partial/article.php");
    }
    ?>
</div>