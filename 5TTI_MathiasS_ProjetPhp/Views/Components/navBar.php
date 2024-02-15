<div class="navBar">
    <div class="UNavBar">
        <a href="/"><img class="imageIcon" src="/Assets/Images/menu/accueil.png" alt="Accueil"></a>
    </div>
    <h1>Socieon</h1>
    <?php if(!isset($_SESSION['user'])) : ?>
        <div class="UNavBar">
            <a href="inscription"><img class="imageIcon" src="/Assets/Images/menu/signup.png" alt="Inscription"></a>
            <a href="connection"><img class="imageIcon" src="/Assets/Images/menu/login.png" alt="Connection"></a>
        </div>
    <?php else : ?>
        <div class="UNavBar">
        <a href="profil"><h2><?= $_SESSION["user"]->userName ?></h2></a>
        </div>
    <?php endif ?>
</div>