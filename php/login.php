<?php 
// connexion bdd
require('connexion.php');

// identification utilisateur
if(isset($_GET['submit'])){
    
    if(isset($_GET['submit'])){
        $login_input = $_GET['login_input'];
        $pass_input = $_GET['pass_input'];
        $erreur = "";        
               
        $result = $mysqli -> query('SELECT login, password FROM user WHERE login = "'.$login_input.'" AND password = "'.$pass_input.'"');
    
    // si login et mdp correspondant - ouverture session
        if(mysqli_num_rows($result)){    
            session_start();
            $_SESSION['login'] = $row['login'];
            $_SESSION['login_input'] = $login_input;
            header("location: bienvenue.php");
        }
     // sinon msg d'erreur
        else{
            $erreur = '<i id="warning" class="fa-solid fa-triangle-exclamation"></i><p id="erreur" ><em>  Identifiant ou mot de passe incorrect.' . '<br>' . 'Veuillez saisir à nouveau vos identifiants.</em></p>' . '<br>';   
        }    
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="icon" type="image/png" href="../img/logotype.png">
<!-- Icones - font awesome -->
        <script src="https://kit.fontawesome.com/57fead636f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <title>SHOP. - Connexion</title>
    </head>
    
    
    <body>
        
        <header>
            <ul id="header">
                <li><strong><em>Achats et envois sécurisés</em></strong></li>
                <li><strong><em>Livraison offerte</em></strong></li>
                <li><strong><em>Qualité des produits garantie</em></strong></li>
            </ul>
            
            <div class="ban_menu">

                <h1><a id="titre" alt="Accueil" href="../index.php">SHOP.</a></h1>
                
    <!-- MENU -->
                <nav>
                    <ul id="menu">
                        <li><a class="nav" alt="Contacts" href="../html/contacts.html">Contacts et aide</a></li>
                       
                        <li><a class="nav" alt="Panier" href="../html/panier.html">Votre panier</a></li>
                        
                        <li><a class="nav" alt="Se connecter" href="login.php">S'identifier</a> </li>
                    </ul>
                </nav>
            </div>
            
            
        </header>
        
        <section>
      
        <h2>Saisissez ici votre identifiant et votre mot de passe pour vous connecter.</h2>  
 
    <!-- FORMULAIRE D'IDENTIFICATION UTILISATEUR -->
            <form class="form_co" action="" method="get">
            
                <?php 
                // affichage msg d'erreur si login ou mpd non correspondant
                if(isset($erreur)){
                    echo '<br>' . $erreur;
                }
                ?>
            
                <input type="text" name="login_input" placeholder="votre ID">
                <br>
                <input type="password" name="pass_input" placeholder="votre mot de passe">
                <br>
                <button id="connexion" type="submit" name="submit"><strong>Se connecter</strong></button>
                <br>
            </form>
        </section>
    </body>
    
    <footer>
        <ul id="footer">
            <li>Suivez-nous
                <br>
                <a href="#" alt="instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" alt="twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" alt="facebook"><i class="fa-brands fa-facebook"></i></a>
            </li>
            <li>Vos achats sécurisés
                <br>
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-brands fa-cc-amex"></i>
                <i class="fa-brands fa-cc-paypal"></i>
                <br>Livraisons gratuites pour tout achat
            </li>
            <li>Nos politiques
                <ul class="conditions">
                    <li><a class="politiques" href="#" alt="politique confidentiaité et cookies">Politique de confidentialité et de cookies</a></li>
                    <li><a class="politiques" href="#" alt="conditions utilisation et vente">Conditions générales d'utilisation et de vente</a></li>
                    <li><a class="politiques" href="../html/contacts.html" alt="contacts">Contacts</a></li>
                
                </ul>
            </li>
        </ul>
        
        © 2023 SHOP.
    
    
    </footer>

</html>


