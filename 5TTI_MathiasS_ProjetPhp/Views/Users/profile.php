<div style="display: flex; align-items: center; flex-direction: column;">
    <div class="profileCard">
        <h2>Identifiant : <?= $_SESSION['user']->userId ?></h2>
        <h2>Pseudonyme : <?= $_SESSION['user']->userName ?></h2>
        <h2>Rang : <?= rankUser() ?></h2>
        <h2>Age : <?= ageUser() ?> ans</h2>
    </div>
    <?php
        echo " <a onclick=\"if (!confirm('Vous souhaitez quitter votre session ? ')){ event.preventDefault(); }\" href='Views/Users/deconnexion.php'><button>Déconnection</button></a>";
    ?>
    <a href="editProfil"><button>Modifier le Pseudonyme</button></a>
</div>
