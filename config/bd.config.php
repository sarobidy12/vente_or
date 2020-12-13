<?php

$serveur = 'localhost';

$login = 'root';

$passe = '';

$base_de_donnee = 'vente_or';

$url_site=$_SERVER['HTTP_HOST'];
$url_site_serveur='http://localhost/vente_or/';

   try {

       $pdo = new PDO('mysql:dbname='.$base_de_donnee.';host='.$serveur, $login, $passe);

       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   } catch (PDOException $e) {

       echo 'Connexion échouée : ' . $e->getMessage();

   }


?>

  