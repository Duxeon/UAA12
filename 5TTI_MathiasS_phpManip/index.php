<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php for ($x = 1; $x <= 10; $x++) : ?>
        <p>Le nombre vaut <?= $x ?> </p>
    <?php endfor ?>

    
    <!--étape 3-->
    <?php for ($x = 1; $x <= 10; $x++) : ?>
        <?php if ($x < 4 || $x > 7) : ?>
            <p>Le nombre vaut <?= $x ?> </p>
        <?php endif ?>
    <?php endfor ?>


    <!--étape 4-->
    <?php $y=-5 ?>
    <?php $z=abs($y) ?>
    <p>La valeur absolue de <?=$y?> vaut <?=$z?></p>
    <?php $y=10 ?>
    <?php $z=abs($y) ?>
    <p>La valeur absolue de <?=$y?> vaut <?=$z?></p>
</body>
</html>