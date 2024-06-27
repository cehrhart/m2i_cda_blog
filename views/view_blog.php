<div class="row mb-2">
    <form name="formSearch" method="post" action="#">
        <fieldset>
            <legend>Rechercher des articles</legend>
            <p>
                <label class="form-label" for="keywords">Mots clés</label>
                <input class="form-control" id="keywords" type="text" name="keywords" value="<?php echo $strKeywords; ?>" />
            </p>
            <p>
                <input type="radio" name="period" <?php echo ($intPeriod == 0)?"checked":""; ?> value="0" onclick="changePeriod()" /> Par date exacte
                <input type="radio" name="period" <?php echo ($intPeriod == 1)?"checked":""; ?> value="1" onclick="changePeriod()" /> Par période
            </p>
            <p id="uniquedate">
                <label for="date">Date</label>
                <input id="date" type="date" name="date" value="<?php echo $strDate; ?>" />
            </p>
            <p id="period">
                <label for="startdate">Date de début</label>
                <input id="startdate" type="date" name="startdate" value="<?php echo $strStartDate; ?>" />
                <label for="enddate">Date de fin</label>
                <input id="enddate" type="date" name="enddate" value="<?php echo $strEndDate; ?>"/>
            </p>
            <p>
                <label for="author">Auteur</label>
                <select id="author" name="author" >
                    <option <?php echo ($intAuthor == 0)?"selected":""; ?> value="0">--</option>
                    <option <?php echo ($intAuthor == 1)?"selected":""; ?> value="1">christel</option>
                    <option <?php echo ($intAuthor == 2)?"selected":""; ?> value="2">test</option>
                </select>
            </p>
            <p><input type="submit" value="Rechercher" /> <input type="reset" value="Réinitialiser" /></p>
        </fieldset>
    </form>

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
        // Traitement avant affichage
        /*$objDate 	= new DateTimeImmutable($arrDetArticle['article_createdate']);
        $strDate 	= $objDate->format('d/m/Y');
        $strSummary	= substr($arrDetArticle['article_content'], 0, 50).'...';*/
        // Affichage d'un article
        include("_partial/article.php");
    }
    ?>
</div>