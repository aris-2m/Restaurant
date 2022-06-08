<?php
/*
$GLOBALS["server"]='localhost';
$GLOBALS["login"]='root';
$GLOBALS["pass"]='';

global $server;
$server='localhost';
global $login;
$login='root';
global $pass;
$pass='';
*/

function verifconnected($post){

    $compteur=0;
    $compteurtrue=0;

    foreach ($post as $key => $value) {

      $value=trim($value);
      $value=stripslashes($value);
      $value=strip_tags($value);
      if (isset($value) && !empty($value)) {
        $compteurtrue++;
      }
      if ($key != "button") {
          $compteur++;
      }

    }

    if ($compteur == $compteurtrue) {

      $server='localhost';
      $login='root';
      $pass='';
      try {
        $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete="SELECT idUser,prenom,sexe,email FROM restaurant.utilisateur
        WHERE email=:email and password=:password";

        $requetepreperee=$connexion->prepare($requete);

        $email=strtolower($post["email"]);
        $requetepreperee->bindParam(':email',$email);
        $requetepreperee->bindParam(':password',$post["password"]);


        $requetepreperee->execute();

        $resultat=$requetepreperee->fetch();
        // $prepre=$resulat;
        return $resultat;
        // return "okay";


      } catch (PDOException $e) {
        return "";
      }

      }
}

function formulaireins($post)
{

  $compteur=0;
  $compteurtrue=0;

  foreach ($post as $key => $value) {

    $value=trim($value);
    $value=stripslashes($value);
    $value=strip_tags($value);
    if (isset($value) && !empty($value)) {
      $compteurtrue++;
    }
    if ($key != "button") {
        $compteur++;
    }

  }
  if ($compteur != $compteurtrue) {
    $allersur="formins.php";
    $texte="DONNEES INCORRECTES, <strong>CLIQUEZ SUR RETOUR</strong> <br>";
    // $texte=$post;

    }
  else {
    $server='localhost';
    $login='root';
    $pass='';
    try {
      $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
      $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      try {

              $requete="INSERT INTO restaurant.utilisateur(nom,prenom,sexe,email,adresse,birthday,password)
              VALUES(:nom,:prenom,:sexe,:email,:adresse,:birthday,:password)";

              $on="oui1";

              $requetepreperee=$connexion->prepare($requete);

$on=" Connexion faite - Pas bind";

              $requetepreperee->bindParam(':nom',$post["nom"]);
              $requetepreperee->bindParam(':prenom',$post["prenom"]);
              $requetepreperee->bindParam(':sexe',$post["sexe"]);
              $requetepreperee->bindParam(':email',strtolower($post["email"]));
              $requetepreperee->bindParam(':adresse',$post["adresse"]);
              $requetepreperee->bindParam(':birthday',$post["birthday"]);
              $requetepreperee->bindParam(':password',$post["password"]);
$on="Bind fait - Pas executé";
              $requetepreperee->execute();

              $texte="INSCRIPTION REUSSIE, <br>";
              // $texte=$post;

              $allersur="../index.php";

              $_SESSION["email"]=$post["email"];
              $_SESSION["prenom"]=$post["prenom"];
              $_SESSION["sexe"]=$post["sexe"];
$on="Executé";
      } catch (PDOException $e) {
        $texte="Cet email est déjà lié à un autre compte !";
        $allersur="formins.php";
      }

    } catch (PDOException $e) {
      // echo "Echec de la connexion: ".$e->getMessage();
      $texte="Erreur de connexion ! ";
      $allersur="formins.php";
    }


    }
    $tableau=["texte"=>$texte,"allersur"=>$allersur,];
    return $tableau;
}

function dashboard(){

  $server='localhost';
  $login='root';
  $pass='';
  try {
    $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requete="SELECT nom,prenom,sexe,email,adresse,birthday,password FROM restaurant.utilisateur
    WHERE email=:email";

    $requetepreperee=$connexion->prepare($requete);

    $requetepreperee->bindParam(':email',$_SESSION["email"]);



    $requetepreperee->execute();

    $resultat=$requetepreperee->fetch();
    // $prepre=$resulat;
    return $resultat;
    // return "okay";


  } catch (PDOException $e) {
    return "";
  }

}


function mets(){

      $server='localhost';
      $login='root';
      $pass='';
      try {
        $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete="SELECT nomMenu,prixMenu,quantiteMenu,image,texte FROM restaurant.menu";

        $requetepreperee=$connexion->prepare($requete);
        $requetepreperee->execute();

        $resultat=$requetepreperee->fetchAll();

        return $resultat;

      } catch (PDOException $e) {
        return "";
      }
}
function panier(){

      $server='localhost';
      $login='root';
      $pass='';
      try {
        $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete="SELECT ajout.idUser,ajout.quantitéAjout,menu.idMenu,menu.nomMenu,menu.prixMenu,menu.image,menu.quantiteMenu,menu.texte FROM restaurant.menu INNER JOIN restaurant.ajout
        ON restaurant.menu.idMenu = restaurant.ajout.idMenu WHERE idUser=:user ";

        $requetepreperee=$connexion->prepare($requete);

        $requetepreperee->bindParam(':user',$_SESSION["idUser"]);

        $requetepreperee->execute();

        $resultat=$requetepreperee->fetchAll();


        return $resultat;

      } catch (PDOException $e) {
        return "";
      }
}


function affichpanier($panier) {
  if (count($panier)>0) {

  for ($i=0; $i <count($panier) ; $i++) {
    $idret=$panier[$i]['idMenu'];
    if ($panier[$i]['quantiteMenu']==0) {
      $boutt="<span class='epuise' disabled></span>";
      $sombre=" sombre";
      $summar="summary";
    }
    else {
      $boutt="<span class='epuise' disabled></span>";
      $sombre="";
      $summar="summaryc";
    }

      echo "<article class='plats'>";
      $quantitAjout=$panier[$i]["quantitéAjout"];

      $quant="<input class='quant' type='number' id='quant".$idret."' name='p' value=".$quantitAjout." min='1' max='5' step='1' required>";
      $retirer="<button type='button' class='retirer' id='retirer".$idret."' name='button'>RETIRER</button>";

      echo "<details class='$sombre'>";
      echo "<summary id=".$summar.">"."MENU ".$panier[$i]['idMenu']."- ".$panier[$i]['nomMenu'].$boutt."<span class='prixmenu"."'>".$retirer."<div id='boxquntprix'>".$quant."*".$panier[$i]["prixMenu"]." DHS"."</div>"."</span></summary>";
      if ($panier[$i]['quantiteMenu']!=0) {
        echo "<p>";
        echo "<img class='platfloat'src='../images/".$panier[$i]["image"]."' >";
        // width='200px' height='200px'
        echo "<p>";
        try {
          $a=$panier[$i]['texte'];
          $texte=fopen("../fichiers/$a","r");
          if (!$texte) {
            exit("Erreur d'ouverture du fichier");
          }
          while (!feof($texte)) {
            echo fgetc($texte);
          }
          fclose($texte);

        } catch (Exception $e) {

        }


        echo "".$boutt;

        echo "</p>";
        echo "</p>";
      }


      echo "</details>";
      echo "</article>";
      echo "<hr>";
      // if ($i!=count($panier)-1) {
      //
      // }
  }
  return 1;
  }
  else {

    return 0;
  }

}
function calctotal($panier)
{
  $produit=1;
  $somme=0;
  for ($i=0; $i <count($panier) ; $i++) {
    if ($panier[$i]['quantiteMenu']!=0){
      $produit=$panier[$i]["quantitéAjout"]*$panier[$i]["prixMenu"];
    }
    else {
      $produit=0;
    }
  $somme+=$produit;
  }
  return $somme;
}
function historique()
{
  $server='localhost';
  $login='root';
  $pass='';


  try {
    $connexion=new PDO("mysql:host=$server;dbanme=restaurant", $login, $pass);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requete="SELECT json,dateCommande FROM restaurant.commande
    WHERE idUser=:idUser ORDER BY idCommande desc";

    $requetepreperee=$connexion->prepare($requete);

    $requetepreperee->bindParam(':idUser', $_SESSION["idUser"]);

    $requetepreperee->execute();

    $resultat=$requetepreperee->fetchAll();

  } catch (PDOException $e) {

  }

  echo "<br>";
  for ($i=0; $i <count($resultat) ; $i++) {

      $nom_fich='../fichiers/json/'.$resultat[$i]["json"];
      $pan=file_get_contents($nom_fich);
      $pan=json_decode($pan,true);

      echo "<span class='numerocommande'> <span> COMMANDE N°</span>: ".(int)substr($resultat[$i]["json"],4+strlen($_SESSION["prenom"]))."<span class='date_com'>".$resultat[$i]["dateCommande"]."</span></span>";
      echo "<div class='box_commandes'>";

      for ($j=0; $j <count($pan) ; $j++) {
          if (isset($pan[$j]) && !empty($pan[$j])) {
          echo "<div class='box_commandes_item'>";
          echo "•  ".$pan[$j]["quantitéAjout"]."x ".$pan[$j]["nomMenu"];

          echo "</div>";
        }
      }
      // echo "<br>";
      echo "<span class='montant'><span> Montant</span>: ".$pan["total"]."Dhs </span>";
      echo "</div>";

      // var_dump($pan);
      echo "</br>";

  }

}
function affichmenus($menus, $ajouter) {
  // echo "<form method='GET' onsubmit='return false'>";
  for ($i=0; $i <count($menus) ; $i++) {

      echo "<article class='plats'>";
      echo "<details  open>";
      echo "<summary id='summaryc' class='summarywithnum'>".$menus[$i]['nomMenu']."<span class='prixmenu'>".$menus[$i]["prixMenu"]." DHs"."</span></summary>";
      echo "<div class='content-summary'>";
      echo "<p>";
      echo "<img class='platfloat'src='images/".$menus[$i]["image"]."' >";
      echo "<p>";



      try {

          $a=$menus[$i]['texte'];
          $texte=fopen("fichiers/$a","r");

          if (!$texte) {
            throw new Exception("Could not open the file!");
            // exit("Erreur d'ouverture du fichier");

          }

          while (!feof($texte)) {
            echo fgetc($texte);
          }
          fclose($texte);

      } catch (Exception $e) {
        echo "Les meilleurs mets ici!";
      }




      echo "</p>";
      echo "</p>";
      if ($menus[$i]['quantiteMenu']>0) {
        $idbutton=$i+1;
        if (isset($_SESSION["email"]) && !empty($_SESSION["email"] )) {
          echo "<button type='button' class='bouttonajout' id='bt".$idbutton."'> AJOUTER AU PANIER </button>";
        }
        else {
          echo "<button ".$ajouter." type='button' id='bt".$idbutton."'> AJOUTER AU PANIER </button>";

        }


      }
      else {
        echo "<button type='button' id='bt".$i."'style='opacity:0.5' disabled> STOCK EPUISE</button>";
      }
      echo "</div>";
      if ($i!=count($menus)-1) {
        echo "<hr>";
      }
      echo "</details>";
      echo "</article>";


  }
// echo "</form>";

}

 ?>
