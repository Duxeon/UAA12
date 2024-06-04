<div class="navBar">
    <?php if(!isset($_SESSION['user'])) : ?>
        <p style="color: black;">;</p>
        <div class="UNavBar">
            <a href="/"><img class="imageIcon" src="/Assets/Images/menu/accueil.png" alt="Accueil"></a>
        </div>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
    <?php else : ?>
        <p style="color: black;">;</p>
        <div class="UNavBar">
            <a href="/GroupesRejoins"><img class="imageIcon" src="/Assets/Images/menu/accueil.png" alt="Accueil"></a>
            <a href="/ListeDesGroupe"><img class="imageIcon" src="/Assets/Images/menu/ListeGroupe.png" alt="Accueil"></a>
        </div>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
    <?php endif ?>
    <p class = "titre">Sociéon</p>
    <?php if(!isset($_SESSION['user'])) : ?>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <div class="UNavBar">
            <a href="/inscription"><img class="imageIcon" src="/Assets/Images/menu/signup.png" alt="Inscription"></a>
            <a href="/connection"><img class="imageIcon" src="/Assets/Images/menu/login.png" alt="Connection"></a>
        </div>
        <p style="color: black;">;</p>
    <?php else : ?>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <p style="color: black;">;</p>
        <div class="UNavBar">
        <a href="/profil"><h2><?= $_SESSION["user"]->userName ?></h2></a>
        </div>
        <p style="color: black;">;</p>
    <?php endif ?>
</div>