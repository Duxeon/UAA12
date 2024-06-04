<?php if($_SESSION["user"]->userRank!='usr'): ?>
<form action="" method="post">
    <h2> Création d'un Groupe</h2>
    <div>
        <label>
            <input label="GroupeId" required="true" maxlength="16" type="text" name="GroupeId" placeholder="Id du Groupe (secret pour les groupes privés)" pattern="[a-z]{4,16}">
            <input label="GroupeName" required="true" maxlength="15" type="text" name="GroupeName" placeholder="Nom du Groupe">
            <select name="GroupeVisible">
                <option value="0">Invisible</option>
                <option value="1">Visible</option>
            </select>
            <input label="GroupeDesc" required="true" maxlength="255" type="text" name="GroupeDesc" placeholder="Decription du Groupe">
        </label>                
    </div>
    <button type="submit" name="GroupeEnvoi"><p>Créer</p></button>
</form>
<?php endif ?>