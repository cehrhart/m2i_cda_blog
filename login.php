<?php
	// Variables d'affichage
	$strH1		= "Se connecter";
	$strPar		= "Page permettant de se connecter";
	
	// Variables de fonctionnement
	$strPage 	= "login";
	
	include("_partial/header.php");
?>	
<form>
	<p>
		<label for="mail">Mail</label>
		<input type="text" >
	</p>
	<p>
		<label for="pwd">Mot de passe</label>
		<input type="password" >
	</p>
	<p>
		<input class="form-control btn btn-primary" type="submit" >
	</p>
</form>

<a href="forgot_pwd.php">Mot de passe oublié</a>

<?php
	include("_partial/footer.php");
?>