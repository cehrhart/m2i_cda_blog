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