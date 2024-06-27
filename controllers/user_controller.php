<?php
    /**
     * Controller des utilisateurs
     */
    class UserCtrl extends Controller {
        /**
         * Page Login
         * @return void
         */
        public function login(){
            // Variables d'affichage
            $this->_arrData['strH1']	= "Se connecter";
            $this->_arrData['strPar']	= "Page permettant de se connecter";

            // Variables de fonctionnement
            $this->_arrData['strPage']	= "login";

            /* Partie fonctionnement de la connection */
            //var_dump($_POST);
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
            $this->_arrData["arrErrors"] = $arrErrors;
            // Affichage
            $this->_display("login");
        }
        /**
         * Page Logout
         * @return void
         */
        public function logout()
        {
            // On lance la session pour pouvoir la détruire
            session_start();
            session_destroy();

            // on lance la session pour le message puis redirection vers la page d'accueil
            session_start();
            $_SESSION['message']= "Vous êtes bien déconnecté";
            header("Location:index.php");
        }

        /**
         * Page Création de compte
         * @return void
         */
        public function create_account()
        {
            // Variables d'affichage
            $this->_arrData['strH1']	= "Créer un compte";
            $this->_arrData['strPar']	= "Page permettant de créer son compte";

            // Variables de fonctionnement
            $this->_arrData['strPage'] 	= "create_account";

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
                        header("Location:index.php?controller=user&action=login");
                    }else{
                        $arrErrors[] = "Erreur dans l'ajout";
                    }
                }
            }
            // Variables utilisées pour la vue
            $this->_arrData['objUser']  = $objUser;
            $this->_arrData['arrErrors'] = $arrErrors;
            // Affichage
            $this->_display("create_account");
        }

    }