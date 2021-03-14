<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Le jeu du pendu</title>
</head>
<body>
    <div id="wrapper">
        <main>
            <h1>Le pendu</h1>
            <div id="fautes"></div>
            <div id="jeu">
            
            </div>

            <?php
                include "liste.php";
            ?>
            <div id="texte"></div>
            <a href="" id="bouton" class="invisible" type="button">Relancer une partie</a>
            <div id="pendu">
                <img id="penduImage" src="./image/pendu0.png" alt="Pendu"> <!-- pour dessiner le pendu -->
            </div>
        </main>    
    </div>    
    <?php                
        include "script.php";
    ?>


</body>
</html>