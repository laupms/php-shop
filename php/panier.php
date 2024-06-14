<?php
// connexion bdd
require ('connexion.php');

// ouverture session
session_start();

// supprimer les produits dans le panier
if(isset($_GET['del'])){
    $id_del = $_GET['del'];
    unset($_SESSION['panier'][$id_del]);
}

// affichage login utilisateur
$result = $mysqli -> query('SELECT login, password FROM user');
$row = $result -> fetch_array();

$_SESSION['login'] = $row['login'];

// création array panier - affichage du nombre de produits dans le panier
if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
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
        <title>SHOP. - Panier</title>
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
                            <?php // affichage nb de produits ajoutés au panier
                            echo array_sum($_SESSION['panier']); 
                            ?>
                        </span></a></li>
                    
                    <li><a class="nav" alt="Contacts" href="contacts.php">Contacts et aide</a></li>
                    
                    <li><a class="nav" alt="Se déconnecter" href="logout.php">Se déconnecter</a> </li>
                </ul>
            </nav>
            </div>
            
            
        </header>

      <h2>Votre panier : </h2>  
          <section>
                <table>
                    
                    <tr class="titres_panier">
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Action</th>
                    </tr>
      
                    
                    <?php 
                    
                    $total = 0;
                    
                    // récup clés du tableau session panier
                    $ids = array_keys($_SESSION['panier']);
                    
                    
                    // affichage liste des produits sélectionnés
                    if(empty($ids)){
                        echo '<p id="msg_panier_vide" >Votre panier est vide.</p>' .'<br>';
                    }else{
                   
                        $result = $mysqli -> query('SELECT produit_id, produit_nom, produit_prix FROM produits');
                        
                        foreach ($result as $produit){
                            
                            if(isset($_SESSION['panier'][$produit['produit_id']])){
                                
                            // afficher total du panier = total (0) + prix du produit * quantité
                            $total = $total + $produit['produit_prix'] * $_SESSION['panier'][$produit['produit_id']];
                    ?>
        
                    <tr>
                        <td><?php echo $produit['produit_nom']; ?></td>
                        <td><?php echo $produit['produit_prix'] . ' €'; ?></td>
                        <td><?php echo $_SESSION['panier'][$produit['produit_id']]; ?></td>
                        <td><a id="trash" href="panier.php?del=<?php echo $produit['produit_id'] ?>" alt="supprimer"><i class="fa-regular fa-trash-can"></i></a></td>
                    </tr>
                   
                    <?php }}; ?>
                    
                    
                    <table>
                        <tr class="total">
                            <th>Quantité totale = <?php echo array_sum($_SESSION['panier']); ?></th>
                            <th>Total = <?php  echo $total .' €'; }?></th>
                        </tr>
                    </table>
                </table>
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
                    <li><a class="politiques" href="contacts.php" alt="contacts">Contacts</a></li>
                
                </ul>
            </li>
        </ul>
        
        © 2023 SHOP.
    
    </footer>


</html>