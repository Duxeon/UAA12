<link rel="stylesheet" href="/Assets/Css/listeGroupe.css">
<?php if($_SESSION["user"]->userRank!='usr'): ?> <a href="/createGroupe"><button class="newG"><p>Créer un groupe</p></button></a> <?php endif; ?>
<h1 style="margin: 1%;">Liste des groupes publiques</h1>
<?php foreach ($groupes as $groupe) : ?>
    <div class="groupe">
        <h2><?= $groupe->groupeName ?></h2>
        <p><?= $groupe->groupeDesc ?></p>
        <a onclick="<?= $groupeIdPage = $groupe->groupeId ?>" href="groupe/<?= $groupeIdPage ?>"><button class="entrer"><p>Entrer</p></button></a>
    </div>
<?php endforeach ?>
