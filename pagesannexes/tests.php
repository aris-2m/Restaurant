<?php


// register.php


$server='localhost';
$login='root';
$pass='';
try {
  $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
  $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $requete="UPDATE restaurant.utilisateur
  SET password='m'";

  $requetepreperee=$connexion->prepare($requete);

  // $email=strtolower($post["email"]);
  // $requetepreperee->bindParam(':email',$email);

  $requetepreperee->execute();



} catch (PDOException $e) {
  return "";
}


?>
