<?php
	// Variables d'affichage
	$strH1		= "Accueil";
	$strPar		= "Page affichant les 4 derniers articles";
	
	// Variables de fonctionnement
	$strPage 	= "index";
	
	require("_partial/header.php");

	// Ecrire la requête comme dans PHPMyAdmin
	/*$strQuery		= "SELECT article_title, article_img, article_content, article_createdate,
							CONCAT(user_name, ' ', user_firstname) AS article_author
						FROM articles
							INNER JOIN users ON article_creator = user_id
						ORDER BY article_createdate DESC 
						LIMIT 4 OFFSET 0;";
	// On execute la requête et on demande tous les résultats
	$arrArticles	= $db->query($strQuery)->fetchAll();
	*/
    // Quel fichier ?
    require_once("models/article_model.php");
    // Instancier la classe => objet
    $objModel   = new ArticleModel();
    // Quelle méthode appeler
    $arrArticles = $objModel->findAll(4);
	//var_dump($arrArticles);
?>

<div class="row mb-2">
	<?php
		if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
	?>
	<p><a alt="Ajouter un article" href="add_article.php">Ajouter un article</a></p>
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

<?php
	include("_partial/footer.php");
?>
