<?php

// ouverture session
session_start();

// déconnexion de la session - rediriger vers accueil index.php
if(session_destroy()){
    header('location: ../index.php');
}

?>