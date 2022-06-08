<?php
session_start();

      $server='localhost';
      $login='root';
      $pass='';

      $idMenuActu=$_POST["id_modif"][-1];
      settype($idMenuActu, "integer");

      try {
        $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete="UPDATE restaurant.ajout SET quantitéAjout=:newquant
        WHERE idMenu=$idMenuActu and idUser=:idUser";

        $requetepreperee=$connexion->prepare($requete);

        $requetepreperee->bindParam(':idUser', $_SESSION["idUser"]);
        $requetepreperee->bindParam(':newquant', $_POST["value"]);

        $requetepreperee->execute();

        echo "";

      } catch (PDOException $e) {

      }

 ?>
