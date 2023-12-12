<!DOCTYPE html>
<html lang="fr">
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
            <h2>Commandez notre application AstiCalc</h2>
        </div>
        <form>
            <div class="home">
                <fieldset>      
                    <legend>Vos Information</legend>
                    <div class="inputText">
                        <label for="">Votre Nom</label><input type="text" required>
                    </div>
                    <div class="inputText">
                        <label for="">Votre Prénom</label><input type="text" required>
                    </div>
                    <div class="inputText">
                        <label for="">Votre Mail</label><input type="text" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Parametrez votre commande</legend>
                    <div class="inputText">
                        <label for="">Choisissez parmi les possibiliter</label>
                        <select name="" id="">
                            <option value="">PC</option>
                            <option value="">Téléphone</option>
                        </select>
                    </div>
                    <div class="inputText">
                        <label for="">Date de début d'abonnement</label>
                        <input type="date" required>
                    </div>
                    <div class="inputText">
                        <label for="">Facture</label>
                        <input type="radio" name="test" checked> <p>Par Mail</p> <input type="radio" name="test">  <p>Par Papier</p>
                    </div>
                </fieldset>
            </div>
            <input type="submit">
        </form>
    </body>
</html>