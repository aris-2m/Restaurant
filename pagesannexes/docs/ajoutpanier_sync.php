<?php
session_start();
// var_dump($_POST);
      $server='localhost';
      $login='root';
      $pass='';

      $idMenuActu=$_POST["id_boutton"][-1];
      settype($idMenuActu, "integer");
      $quantitéAjout=1;
      try {
        $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete="SELECT * FROM restaurant.ajout WHERE idMenu=$idMenuActu and idUser=:idUser
        ORDER BY quantitéAjout desc LIMIT 1";

        $requetepreperee=$connexion->prepare($requete);

        $requetepreperee->bindParam(':idUser', $_SESSION["idUser"]);

        $requetepreperee->execute();

        $resultat=$requetepreperee->fetchAll();

        if (isset($resultat) && !empty($resultat)) {
          if ($resultat[0]["quantitéAjout"]<5) {
            $requete3="UPDATE restaurant.ajout SET quantitéAjout=quantitéAjout+1
            WHERE idMenu=$idMenuActu and idUser=:idUser";

            $requetepreperee3=$connexion->prepare($requete3);

            $requetepreperee3->bindParam(':idUser', $_SESSION["idUser"]);

            $requetepreperee3->execute();

            echo ++$resultat[0]["quantitéAjout"]," ajouté au Panier";
          }
          else {
            echo "Nombre MAX de commandes par MENU (5) atteint!";
          }

        }
        else {
          $requete2="INSERT INTO restaurant.ajout(idUser,idMenu,quantitéAjout)
          VALUES(:idUser,$idMenuActu,$quantitéAjout)";

          $requetepreperee2=$connexion->prepare($requete2);

          if (!isset($_SESSION["idUser"]) || empty($_SESSION["idUser"]))
          {
            $requete3="SELECT idUser FROM restaurant.utilisateur
            WHERE email=:email";

            $requetepreperee3=$connexion->prepare($requete3);

            $requetepreperee3->bindParam(':email', $_SESSION["email"]);

            $requetepreperee3->execute();

            $resultatid=$requetepreperee3->fetchAll();

            $_SESSION["idUser"]=$resultatid[0]["idUser"];
          }

          $requetepreperee2->bindParam(':idUser', $_SESSION["idUser"]);

          $requetepreperee2->execute();

          echo "1 ajouté au panier!";
        }


      } catch (PDOException $e) {

      }

 ?>
