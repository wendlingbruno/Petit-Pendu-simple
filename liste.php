<?php

session_start();

if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

if(isset($_GET['winner'])){
    setScore();
    header("Location:/Pendu2/");
}

function getScore(){
    return $_SESSION['score'];
}

function setScore(){
    $_SESSION['score'] = $_SESSION['score'] + 1;
}


function getMot(){
    $listeMots = ["bonjour","bonsoir","feuille","morpion","table","boite","porte","ordinateur","clavier"];
    $mot = "";
    $nb = rand(0, (count($listeMots)-1));
    $mot = $listeMots[$nb];
    return $mot;
}

function getMot2(){
    $myfile = fopen("./fichier/mots.txt", "r");
    $tableau = [];
    while(!feof($myfile)){
        array_push($tableau, trim(fgets($myfile)));
        //var_dump(trim(fgets($myfile)));
      }
      fclose($myfile);
      $nb = rand(0, (count($tableau)-1));
      $mot = $tableau[$nb];
      return $mot;
}

?>