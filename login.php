<?php
	// Variables d'affichage
	$strH1		= "Se connecter";
	$strPar		= "Page permettant de se connecter";
	
	// Variables de fonctionnement
	$strPage 	= "login";
	
	include("_partial/header.php");

    /* Partie fonctionnement de la connection */
    var_dump($_POST);
    // initialise le tableau des erreurs
    $arrErrors	= array();
    // Si le formulaire a été envoyé
    if (count($_POST) > 0) {
        if ($_POST['mail'] == ''){
            $arrErrors['mail'] = "Le mail est obligatoire";
        }
        if ($_POST['password'] == ''){
            $arrErrors['password'] = "Le mot de passe est obligatoire";
        }

        if (count($arrErrors) === 0) {
            require_once("models/user_model.php");
            $objModel = new UserModel();
            //$arrUser    = $objModel->findByMailAndPwd($_POST['mail'], $_POST['password']);
            $arrUser = $objModel->findByMailAndPwd();

            if ($arrUser !== false) {
                $_SESSION['id']     = $arrUser['user_id'];
                $_SESSION['prenom'] = $arrUser['user_firstname'];
                $_SESSION['message']= "Vous êtes bien connecté";
                header("Location:index.php");
            } else {
                $arrErrors[] = "Erreur de connexion";
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
		<label for="mail">Mail</label>
		<input type="text" name="mail" value="<?php echo $_POST['mail']??''; ?>">
	</p>
	<p>
		<label for="pwd">Mot de passe</label>
		<input type="password" name="password">
	</p>
	<p>
		<input class="form-control btn btn-primary" type="submit" >
	</p>
</form>

<a href="forgot_pwd.php">Mot de passe oublié</a>

<?php
	include("_partial/footer.php");
?>