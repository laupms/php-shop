<?php require ('connexion.php');

// ouverture session
session_start();



// affichage login utilisateur
$result = $mysqli -> query('SELECT login, password FROM user');
$row = $result -> fetch_array();

$_SESSION['login'] = $row['login'];

// affichage du nombre de produits dans le panier
if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
}
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="../img/logotype.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <!-- Icones - font awesome -->
        <script src="https://kit.fontawesome.com/57fead636f.js" crossorigin="anonymous"></script>
        <title>SHOP. - Contacts</title>
    </head>
    
    <body>  
        <header> 
            <ul id="header">
                <li><strong><em>Achats et envois sécurisés</em></strong></li>
                <li><strong><em>Livraison offerte</em></strong></li>
                <li><strong><em>Qualité des produits garantie</em></strong></li>
            </ul>
            
            <div class="ban_menu">
                
                <h1><a id="titre" alt="Accueil" href="bienvenue.php">SHOP.</a></h1> 
                
                <!-- MENU -->
                <nav>
                    <ul id="menu">
                    
                        <li><p id="msg_perso"><em><?php echo 'Bonjour, ' . $_SESSION['login'] . ' !';?></em></p></li>
                    
                        <li><a class="nav" alt="Panier" href="panier.php">Votre panier 
                            <span>
                                <?php 
                                // affichage nb de produits ajoutés au panier
                                echo array_sum($_SESSION['panier']); ?>
                            </span></a></li>
             
                        <li><a class="nav" alt="Contacts" href="contacts.php">Contacts et aide</a></li>
                    
                        <li><a class="nav" alt="Se déconnecter" href="logout.php">Se déconnecter</a> </li>
                    </ul>
                </nav>
            </div>
            
            
        </header>
      
    
  <h2>Contactez-nous !</h2>  
        
        <div id="contacts">
        <p>Par téléphone : <a href="tel:" alt="telephone">01 02 03 04 05</a>
        <br><br>
        Par email : <a href="mailto:shop@email.com" alt="mail" >shop@email.com</a>
        <br><br>
        Par courrier postal : 1 Rue du Commerce 75000 PARIS
        </p>
        </div>
       
        
        
        
        

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
                    <li><a class="politiques" href="contacts.php" alt="contacts">Contacts</a></li>
                
                </ul>
            </li>
        </ul>
        
        © 2023 SHOP.
    
    
    </footer>



</html>