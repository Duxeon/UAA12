<link rel="stylesheet" href="/Assets/Css/profile.css">
<div>
    <div class="profile">
        <h2>Identifiant : <?= $_SESSION['user']->userId ?></h2>
        <h2>Pseudonyme : <?= $_SESSION['user']->userName ?></h2>
        <h2>Rang : <?= rankUser() ?></h2>
        <h2>Age : <?= ageUser() ?> ans</h2>
    </div>
    <?php
        echo " <a onclick=\"if (!confirm('Souhaitez vous vous déconnecter ? ')){ event.preventDefault(); }\" href='Views/Users/deconnexion.php'><button><p>Déconnection</p></button></a>";
    ?>
    <a href="editProfil"><button><p>Modifier le Pseudonyme</p></button></a>
    <?php
        if (($_SESSION["user"]->userRank)!="dux") {
            echo " <a onclick=\"if (!confirm('Souhaitez vous vraiment supprimer votre compte ? ')){ event.preventDefault(); }\" href='/suppressProfil'><button><p>Suppression du compte</p></button></a>";
        }
    ?>
</div>
