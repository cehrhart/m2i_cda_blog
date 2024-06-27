<?php
	// Variables d'affichage
	$strH1		= "Ajouter un article";
	$strPar		= "Page permettant d'ajouter un article";
	
	// Variables de fonctionnement
	$strPage 	= "add_article";

	include("_partial/header.php");

?>
<form>
	<p>
		<label for="title">Titre</label>
		<input type="text" >
	</p>
	<p>
		<label>Image</label>
		<input type="file">
	</p>
	<p>
		<label>Contenu</label>
		<textarea></textarea>
	</p>	
	<p>
		<input class="form-control btn btn-primary" type="submit" >
	</p>
</form>

<?php
	include("_partial/footer.php");
?>