<div>
    <div>
        <h2>Identifiant : <?= $_SESSION['fUser']->userId ?></h2>
        <h2>Pseudonyme : <?= $_SESSION['fUser']->userName ?></h2>
        <h2>Rang : <?= rankfUser("membre", $pdo) ?></h2>
        <h2>Age : <?= agefUser() ?> ans</h2>
    </div>
    <a href="/user/<?= $_SESSION['fUser']->userId?>"><button><p>Profil Universel</p></button></a>
    <?php if($_SESSION['membre']->membreRank == 'dux' && $_SESSION['fmembre']->membreRank != 'dux') : ?>
        <form action="" method="post">
            <select name="mRole" size="1">
                <option value="usr">Utilisateur</option>
                <option value="mut">muet</option>
                <option value="mod">Modérateur</option>
                <option value="adm">Administrateur</option>
            </select>
            <button type="submit" name="updateRank"><p>Modifier</p></button>
        </form>
    <?php endif; ?>

    <?php if($_SESSION['membre']->membreRank == 'adm' && $_SESSION['fmembre']->membreRank != 'dux' && $_SESSION['fmembre']->membreRank != 'adm') : ?>
        <form action="" method="post">
            <select name="mRole" size="1">
                <option value="usr">Utilisateur</option>
                <option value="mut">muet</option>
                <option value="mod">Modérateur</option>
            </select>
            <button type="submit" name="updateRank"><p>Modifier</p></button>
        </form>
    <?php endif; ?>

    <?php if($_SESSION['membre']->membreRank == 'mode' && $_SESSION['fmembre']->membreRank != 'dux' && $_SESSION['fmembre']->membreRank != 'adm' && $_SESSION['fmembre']->membreRank != 'mod') : ?>
        <form action="" method="post">
            <select name="mRole" size="1">
                <option value="usr">Utilisateur</option>
                <option value="mut">muet</option>
            </select>
            <button type="submit" name="updateRank"><p>Modifier</p></button>
        </form>
    <?php endif; ?>
</div>
