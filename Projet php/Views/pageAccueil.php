<h1>Liste des groupes publiques</h1>

<div>
    <?php foreach ($groupes as $groupe) : ?>
        <div class="card">
            <h2><?= $groupe->groupeName ?></h2>
            <a href="detailGroupe"><p>Détail du Groupe</p></a>
        </div>
    <?php endforeach ?>
</div>