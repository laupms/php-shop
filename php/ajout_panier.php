<?php 
// connexion bdd
include('connexion.php');

// ouverture session
session_start();



// création array $_SESSION['panier] si il n'existe pas
if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
    
}

// ajout produits au panier
if(isset($_GET['produit_id'])){
    
    // création cookie contenu panier pour 15 jours
    setcookie('cookie', 'panier', time() + 1296000);      
    $_COOKIE['panier'] = $_SESSION['panier'];

    $id = $_GET['produit_id'];
    $result = $mysqli -> query ('SELECT produit_id, produit_nom, produit_prix FROM produits WHERE produit_id = "'.$id.'"');
    
    if(empty($row = $result -> fetch_array())){
        die("Ce produit n'existe pas.");
    }
    if(empty($result)){
        die("Ce produit n'existe pas.");
    }
    
    // si id existe dans le panier - rediriger vers accueil utilisateur bienvenue.php
    if(isset($_SESSION['panier'][$id])){
        $_SESSION['panier'][$id]++;
    }else{
        $_SESSION['panier'][$id] = 1;
    }
    header('location: bienvenue.php');  
}

?>