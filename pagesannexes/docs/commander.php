<?php
session_start();

require '../fonctions.php';

$server='localhost';
$login='root';
$pass='';


try {
  $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
  $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $requete="SELECT * FROM restaurant.commande
  WHERE idUser=:idUser ORDER BY idCommande desc LIMIT 1";

  $requetepreperee=$connexion->prepare($requete);

  $requetepreperee->bindParam(':idUser', $_SESSION["idUser"]);

  $requetepreperee->execute();

  $resultat=$requetepreperee->fetchAll();

} catch (PDOException $e) {

}
if (isset($resultat) && !empty($resultat)) {

  $nom_fichier=$resultat[0]["json"];
  $lettre=substr($nom_fichier, 4+strlen($_SESSION["prenom"]));
  settype($lettre,'integer');
  $lettre++;
  $nom_fichier="json".$_SESSION["prenom"].$lettre.".json";

}
else {
  $nom_fichier="json".$_SESSION["prenom"]."1.json";
}

$panier=panier();
for ($k=0; $k <count($panier) ; $k++) {
  if ($panier[$k]['quantiteMenu']==0) {
    unset($panier[$k]);
    // $panier[$k]=[];
  }
}
$panier["total"]=calctotal($panier);
$pan=json_encode($panier);

file_put_contents('../../fichiers/json/'.$nom_fichier,$pan);

try {
  $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
  $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $requete="INSERT INTO restaurant.commande(idUser,json) VALUES(:idUser,:nom_fic)";

  $requetepreperee=$connexion->prepare($requete);

  $requetepreperee->bindParam(':idUser', $_SESSION["idUser"]);
  $requetepreperee->bindParam(':nom_fic', $nom_fichier);

  $requetepreperee->execute();
  echo "COMMANDE REUSSIE";
  $_SESSION["commande_reussie"]="COMMANDE REUSSIE";

  $requete2="DELETE FROM restaurant.ajout WHERE idUser=:idUser";

  $requete2preperee=$connexion->prepare($requete2);

  $requete2preperee->bindParam(':idUser', $_SESSION["idUser"]);

  $requete2preperee->execute();


} catch (PDOException $e) {

}

header("Location: ./../panier.php");



 ?>
