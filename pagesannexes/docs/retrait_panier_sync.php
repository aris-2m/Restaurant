<?php
session_start();
// var_dump($_POST);
      $server='localhost';
      $login='root';
      $pass='';

      $idMenuActu=$_POST["id_retirer"][-1];
      settype($idMenuActu, "integer");

      try {
        $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete="DELETE FROM restaurant.ajout WHERE idMenu=$idMenuActu and idUser=:idUser";

        $requetepreperee=$connexion->prepare($requete);

        $requetepreperee->bindParam(':idUser', $_SESSION["idUser"]);

        $requetepreperee->execute();

        // echo "MENU ".$idMenuActu."retiré avec succcès du panier";

      } catch (PDOException $e) {

      }

 ?>
