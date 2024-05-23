<form action="" method="post">
    <h2>Connection</h2>
    <div>
        <label>
            <input label="Identifiant" required="true" maxlength="25" type="text" name="id" placeholder="Identifiant">
        </label>                
    </div>
    <div>
        <label>
            <input label="Mot de passe" required="true" maxlength="16" type="password" name="password" placeholder="Mot de passe">
        </label>
    </div>
        <button type="submit" name="signinEnvoi"><p>Se connecter</p></button>
        <?php if(isset($erreur)) : ?>
            <?php if($erreur) : ?>
                <h1>Veuillez réessayer</h1>
            <?php endif ?>
        <?php endif ?>
</form>