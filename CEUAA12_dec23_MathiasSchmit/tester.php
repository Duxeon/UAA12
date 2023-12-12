<!DOCTYPE html>
<html lang="fr">
    <?php
        require_once 'fonction.php';

    if(isset($_GET['A'])) 
        $a = $_GET['A']; 
    if(isset($_GET['B'])) 
        $b = $_GET['B']; 
    if(isset($_GET['C'])) 
        $c = $_GET['C']; 
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css\index.css">
        <title>5TTI Mathias Schmit PHP</title>
    </head>
    <body>
        <header>
            <a href="index.php"><div class="ovale"><h1>Home</h1></div></a>
            <a href="tester.php"><div class="ovaleB"><h1>Tester l'application</h1></div></a>
            <div class="ovale"><h1>Contact</h1></div>
        </header>
        <div class="sousTitre">
            <h2>Testez notre calculateur de triangle</h2>
        </div>
    </body>
    <div class="triangleField">
        <form action="tester.php" method="get">
            <fieldset>      
                <legend>Les côtés de votre triangle</legend>
                <div class="inputText">
                    <label for="">Côté A</label><input type="number" name="A" id="A" min="0.000001" required>
                </div>
                <div class="inputText">
                    <label for="">Côté B</label><input type="number" name="B" id="B" min="0.000001" required>
                </div>
                <div class="inputText">
                    <label for="">Côté C</label><input type="number" name="C" id="C" min="0.000001" required>
                </div>
                </fieldset>
            <input type="submit" name="boutton" id="boutton" class="boutton"> 
        </form>
        <?php if(isset($a) && isset($b) && isset($c)) : ?>
        <h3><?= CalcTri($a, $b, $c)?></h3>
        <?php endif ?>
    </div>
</html>