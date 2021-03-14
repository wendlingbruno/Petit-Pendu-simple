<h1>SCORE : <?= getScore() ?></h1>

<script 
    src="https://code.jquery.com/jquery-3.5.1.min.js" 
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" 
    crossorigin="anonymous">
</script>


<script>



const MAXFAUTES = 8;
let mots = {motComplet : "", motATrouver : "", lettresutilise : ""};
let joueur = {score : 0, fautes : 0};
let finDePartie = false;




function partie(){
    $("#texte").text(""); // effacer
    finDePartie = false;
    joueur.fautes = 0;
    mots.motComplet = "<?php echo getMot2(); ?>";
    console.log(mots.motComplet);
    console.log(mots.motComplet.length);
    mots.lettresutilise= new Array();
    mots.motATrouver = new Array(mots.motComplet.length);
    mots.motATrouver.fill("_");
    $("#jeu").text(mots.motATrouver.join("")); // join pour retirer la virgule de base du tableau
    console.log(mots.motATrouver);
    $("#fautes").text(joueur.fautes+"/"+MAXFAUTES);
}



$(this).keypress(function(event) {
    let pasDeFautes = false;
    let lettreUtilise = true;
    if (!finDePartie){
        let touche = String.fromCharCode(event.which); // récupère la touche appuyée
            touche = touche.toLowerCase();
        for (let i = 0;i <= mots.lettresutilise.length;i++){
            if (touche == mots.lettresutilise[i]){
                lettreUtilise = false;
            }
        }
        if (lettreUtilise){ // si la lettre n'a pas déjà été dite, on rentre dedans
            for (let j = 0;j <= mots.motComplet.length;j++){
                if (mots.motComplet[j] == touche){
                    mots.motATrouver[j] = touche;
                    $("#jeu").text(mots.motATrouver.join(""));
                    pasDeFautes = true; // comme ça on rentre pas dans la faute pour les autres lettres
                }
            }
        }
        if (!pasDeFautes){ // sinon on va vérifier les fautes dans la boucle
                joueur.fautes++;
                $("#fautes").text(joueur.fautes+"/"+MAXFAUTES);
                $("#penduImage").attr("src", "./image/pendu"+joueur.fautes+".png") // change l'image du pendu à chaque faute
            }else{
                mots.lettresutilise += touche;
            }
        var motsString = mots.motATrouver.join("").toString(); // le join poure retirer les virgules
        console.log(motsString);
        if (mots.motComplet == motsString){
            finDePartie = true;
            $("#texte").text("Vous avez gagné avec un maximum de "+joueur.fautes+" faute(s).");
            $("#bouton").removeClass("invisible");
            $("#bouton").attr("href", $("#bouton").attr("href")+"?winner")
            joueur.score++;
            $("#score").text("Score : "+joueur.score+" victoire(s).");
        }else if (joueur.fautes == MAXFAUTES){
            finDePartie = true;
            $("#texte").text("Vous avez perdu avec "+joueur.fautes+" faute(s).");
            $("#bouton").removeClass("invisible");
        }
    }
    console.log ("Tableau "+mots.lettresutilise);
});



$(document).ready(function() {
    partie(); // initialiser la partie
});

</script>