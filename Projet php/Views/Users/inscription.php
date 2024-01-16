<link rel="stylesheet" href="/Assets/Css/users.css">
<form action="" method="post" class="pageUsers">
    <h2>Inscription</h2>
    <div class="labelUsers">
        <label>
            <input label="Identifiant" required="true" maxlength="25" type="text" name="id" placeholder="Identifiant">
        </label>                
    </div>
    <div class="labelUsers">
        <label>
            <input label="Pseudonyme" required="true" maxlength="25" type="text" name="username" placeholder="Pseudonyme">
        </label>                
    </div>
    <div class="labelUsers">
        <label>
            <input label="Date de Naissance" required="true" type="date" name="naissance" placeholder="Date de Naissance">
        </label>                
    </div>
    <div class="labelUsers">
        <label>
            <input label="Mot de passe" required="true" maxlength="16" type="password" name="password" placeholder="Mot de passe">
        </label>
    </div>
    <button type="submit" class="darkButton"><p>Inscription</p></button>
</form>