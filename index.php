<?php 
// connexion bdd
require ('php/connexion.php'); 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="icon" type="image/png" href="img/logotype.png">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!-- Icones - font awesome -->
        <script src="https://kit.fontawesome.com/57fead636f.js" crossorigin="anonymous"></script>
        <title>SHOP.</title>
    </head>

    <body>
        
        <header> 
            <ul id="header">
                <li><strong><em>Achats et envois sécurisés</em></strong></li>
                <li><strong><em>Livraison offerte</em></strong></li>
                <li><strong><em>Qualité des produits garantie</em></strong></li>
            </ul>
            
            <div class="ban_menu">
                <h1><a id="titre" alt="Accueil" href="index.php">SHOP.</a></h1> 
                
                <nav>
                    <ul id="menu">
                        <li><a class="nav" alt="Contacts" href="html/contacts.html">Contacts et aide</a></li>
                        <li><a class="nav" alt="Panier" href="html/panier.html">Votre panier</a></li>
                        <li><a class="nav" alt="Se connecter" href="php/login.php">S'identifier</a> </li>
                    </ul>
                </nav>
            </div>
            
        </header>
      
        <section class="list-produits">
    
            <?php 
            // affichage liste des produits présents dans la bdd
            $result = $mysqli -> query ('SELECT produit_id, produit_nom, produit_prix FROM produits');
            while($row = $result -> fetch_array()){
            
            ?>
            
            <form action="" class="content">
                <p class="produit_nom"><?php echo $row['produit_nom']; ?></p>
                <p class="produit_prix"><?php echo $row['produit_prix'] . ' €'; ?></p>
                <br>
                <a id="add" href="html/panier.html" alt="ajouter au panier"><i class="fa-solid fa-circle-plus"></i></a><p id="ajout">Ajouter au panier</p>
            </form>
    
            <?php }?>
    
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
                    <li><a class="politiques" href="html/contacts.html" alt="contacts">Contacts</a></li>
                
                </ul>
            </li>
        </ul>
        
        © 2023 SHOP.
    

    </footer>

</html>