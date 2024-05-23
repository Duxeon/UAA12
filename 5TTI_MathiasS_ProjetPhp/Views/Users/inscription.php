<form action="" method="post">
    <h2>Inscription</h2>
    <div>
        <label>
            <p>4 à 25 caractère, uniquement des lettres minuscules</p>
            <input label="Identifiant" required="true" maxlength="25" type="text" name="id" placeholder="Identifiant" pattern="[a-z]{4,25}">
        </label>                
    </div>
    <div>
        <label>
            <input label="Pseudonyme" required="true" maxlength="25" type="text" name="username" placeholder="Pseudonyme">
        </label>                
    </div>
    <div>
        <label>
            <input label="Date de Naissance" required="true" type="date" name="naissance" placeholder="Date de Naissance">
        </label>                
    </div>
    <div>
        <label>
            <input label="Mot de passe" required="true" maxlength="32" type="password" name="password" placeholder="Mot de passe">
        </label>
    </div>
    <h1>Attention : seul le pseudonyme sera modifiable par la suite</h1>
    <button type="submit" name="signupEnvoi"><p>Inscription</p></button>
</form>