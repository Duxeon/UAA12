<link rel="stylesheet" href="/Assets/Css/profile.css">
<div>
    <div class="profile">
        <h2>Identifiant : <?= $_SESSION['fUser']->userId ?></h2>
        <h2>Pseudonyme : <?= $_SESSION['fUser']->userName ?></h2>
        <h2>Rang : <?= rankfUser("user", $pdo) ?></h2>
        <h2>Age : <?= agefUser() ?> ans</h2>
    </div>
    <?php if($_SESSION['user']->userRank == 'dux' && $_SESSION['fUser']->userRank != 'dux') : ?>
        <form action="" method="post">
            <select name="role" size="1">
                <option value="usr">Utilisateur non confirmé</option>
                <option value="cfm">Utilisateur confirmé</option>
                <option value="inf">Influenceur</option>
                <option value="mod">Modérateur</option>
                <option value="dev">Developpeur</option>
                <option value="adm">Administrateur</option>
            </select>
            <button type="submit" name="updateRank"><p>Modifier</p></button>
        </form>
    <?php endif; ?>

    <?php if($_SESSION['user']->userRank == 'adm' && $_SESSION['fUser']->userRank != 'dux' && $_SESSION['fUser']->userRank != 'adm') : ?>
        <form action="" method="post">
            <select name="role" size="1">
                <option value="usr">Utilisateur non confirmé</option>
                <option value="cfm">Utilisateur confirmé</option>
                <option value="inf">Influenceur</option>
                <option value="mod">Modérateur</option>
                <option value="dev">Developpeur</option>
            </select>
            <button type="submit" name="updateRank"><p>Modifier</p></button>
        </form>
    <?php endif; ?>

    <?php if($_SESSION['user']->userRank == 'mod' && $_SESSION['fUser']->userRank != 'dux' && $_SESSION['fUser']->userRank != 'adm' && $_SESSION['fUser']->userRank != 'mod') : ?>
        <form action="" method="post">
            <select name="role" size="1">
                <option value="usr">Utilisateur non confirmé</option>
                <option value="cfm">Utilisateur confirmé</option>
                <option value="inf">Influenceur</option>
            </select>
            <button type="submit" name="updateRank"><p>Modifier</p></button>
        </form>
    <?php endif; ?>
</div>
