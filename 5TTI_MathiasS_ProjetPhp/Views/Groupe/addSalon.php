<?php $groupeInfo = selectGroupeInfo($pdo) ?>

<link rel="stylesheet" href="/Assets/Css/groupe.css">
<form action="" method="post">
    <h1><?=$groupeInfo[0]->groupeName?></h1>
    <div>
        <label>
            <input label="SalonNom" required="true" maxlength="16" type="text" name="SalonNom" placeholder="Nom du Salon">
        </label>                
    </div>
    <button class="button" type="submit" name="addSalonEnvoi"><p>Créer</p></button>
</form>