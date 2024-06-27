<?php
/* Affichage des messages en session */
/** TODO Vérifier l'affichage */
if (isset($_SESSION['message'])){
    echo "<div class='alert alert-success'>";
    echo "<p class='mb-0'>".$_SESSION['message']."</p>";
    echo "</div>";
    // On supprime le message après l'avoir affiché
    unset($_SESSION['message']);
}
?>

<?php
/* Affichage des erreurs */
if (isset($arrErrors) && count($arrErrors) > 0){
    echo "<div class='alert alert-danger'>";
    foreach ($arrErrors as $strError){
        echo "<p class='mb-0'>".$strError."</p>";
    }
    echo "</div>";
}
?>