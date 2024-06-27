<?php
	// Variables d'affichage
	$strH1		= "Créer un compte";
	$strPar		= "Page permettant de créer son compte";
	
	// Variables de fonctionnement
	$strPage 	= "create_account";
	
	include("_partial/header.php");
	//var_dump($_POST);
	$strConfirm_pwd	= $_POST['confirm_pwd']??"";

    require_once("entities/user_entity.php");
    $objUser = new User();
    $objUser->hydrate($_POST);

    require_once("models/user_model.php");
    $objModel   = new UserModel();

    // initialise le tableau des erreurs
	$arrErrors	= array(); 
	// Si le formulaire a été envoyé
	if (count($_POST) > 0){
		// Si l'utilisateur n'a pas saisi son nom
		if ($objUser->getName() == ""){
			$arrErrors['name'] = "Le nom est obligatoire";
		}
		// Si l'utilisateur n'a pas saisi son prénom
		if ($objUser->getFirstname()  == ""){
			$arrErrors['firstname'] = "Le prénom est obligatoire";
		}
		// Si l'utilisateur n'a pas saisi son mail
		if ($objUser->getMail()  == ""){
			$arrErrors['mail'] = "Le mail est obligatoire";
		}elseif(!filter_var($objUser->getMail(), FILTER_VALIDATE_EMAIL)){
			$arrErrors['mail'] = "Le mail n'est pas valide";
		}else{
			// Récupère les utilisateurs qui ont l'adresse Mail
            $arrUser	= $objModel->getByMail($objUser->getMail());

			// Si j'ai un résultat => erreur
			if($arrUser !== false){
				$arrErrors['mail'] = "Le mail est déjà utilisé";
			}
		}
		
		// Si l'utilisateur n'a pas saisi son mot de passe
		if ($objUser->getPwd() == ""){
			$arrErrors['pwd'] = "Le mot de passe est obligatoire";
		}elseif ($objUser->getPwd() != $strConfirm_pwd){
			$arrErrors['confirm_pwd'] = "Le mot de passe et sa confirmation ne correspondent pas";
		}
		
		// Si le formulaire est OK
		if (count($arrErrors) == 0) {
            $boolOk = $objModel->insert($objUser);

            if ($boolOk) {
                $_SESSION['message'] = "Vous compte à bien été créé, vous pouvez vous connecter";
                // Redirection vers la page d'accueil
                header("Location:login.php");
            }else{
                $arrErrors[] = "Erreur dans l'ajout";
            }
		}		
	}

	/* Affichage des erreurs */
	if (count($arrErrors) > 0){
		echo "<div class='alert alert-danger'>";
		foreach ($arrErrors as $strError){
			echo "<p class='mb-0'>".$strError."</p>";
		}
		echo "</div>";
	}
?>
<form method="post">
	<p>
		<label for="name">Nom</label>
		<input name="name" value="<?php echo $objUser->getName(); ?>" id="name" class="form-control
			<?php if(isset($arrErrors['name'])){ echo 'is-invalid'; } ?>" type="text" >
	</p>
	<p>
		<label for="firstname">Prénom</label>
		<input name="firstname" value="<?php echo $objUser->getFirstname(); ?>" id="firstname" class="form-control
			<?php if(isset($arrErrors['firstname'])){ echo 'is-invalid'; } ?>" type="text" >
	</p>
	<p>
		<label for="mail">Mail</label>
		<input name="mail" value="<?php echo $objUser->getMail();; ?>" id="mail" class="form-control
			<?php if(isset($arrErrors['mail'])){ echo 'is-invalid'; } ?>" type="text" >
	</p>
	<p>
		<label for="pwd">Mot de passe</label>
		<input name="pwd" id="pwd" class="form-control 
			<?php if(isset($arrErrors['pwd'])){ echo 'is-invalid'; } ?>" type="password" >
	</p>
	<p>
		<label for="confirm_pwd">Confirmation du mot de passe</label>
		<input name="confirm_pwd" id="confirm_pwd" class="form-control 
			<?php if(isset($arrErrors['confirm_pwd'])){ echo 'is-invalid'; } ?>" type="password" >
	</p>
	<p>
		<input class="form-control btn btn-primary" type="submit" >
	</p>
</form>

<?php
	include("_partial/footer.php");
?>