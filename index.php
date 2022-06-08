<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
    // last request was more than 60 minutes ago (3600 seconds)
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

 ?>

<?php // TODO: event listiner js pour ajout au panier ?>
<?php // TODO: Quantité a cote de ajoutpanier ?>

<?php // TODO: vues ?>
<!-- TODO: sort un fiche de commande avec chek emporter ou sur place-->
<?php // TODO:cookie analyse de donnees  ?>
<!--  -->
<!-- TODO: downloads -->
<!-- TODO: discuter -->
<!-- TODO: truc de chargement -->
<!-- TODO: transitions nav ul -->
<!-- TODO: transition text header -->
<!-- TODO: transition elements page -->
<!-- TODO: profil infobulle after-->
<!-- TODO: check a deux options -->
<?php // TODO: confirmation de adresse email ?>
<?php // TODO: connecter icones des reseaux ?>


<?php

$page="index";
$lienimages="images/";
$lienlogo="logo/";
$lienicon="icon/";
$liencss="css/";
$lienjs="Js/";
//ajouter au panier se gère dans le nav
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" http-equiv="refresh" content="200">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0"> -->
    <!-- <meta name="viewport" content="width=500, initial-scale=1"> -->

    <!-- <meta name="viewport" content="initial-scale=1, maximum-scale=1"> -->

    <link rel="stylesheet" href="css/stylepage.css">
    <link rel="stylesheet" href="css/stylenav.css">
    <link rel="stylesheet" href="css/styleheaderindex.css">
    <link rel="stylesheet" href="css/styleformcnx.css">

    <link rel="stylesheet" href="css/stylemainindex.css">
    <link rel="stylesheet" href="css/stylesummary.css">
    <link rel="stylesheet" href="css/stylefooter.css">
    <script type="text/javascript" src="<?=$lienjs ?>jsdemarrage.js"></script>
    <title> mx-meals</title>
  </head>
  <body >

    <header id="latete">

      <?php
        require "pagesannexes/fonctions.php";
        require 'pagesannexes/nav.php'; ?>

        <section  id="texteheader">
          <p>
                    Des recettes culinaires à vos goûts!

          </p>

        </section>
        <div class="cards">
          <img  class="card" src="images/menu6.jpg" width="200px" height="200px"  alt="Image de restau">
          <img  class="card" src="images/20210603_133833.jpg" width="200px" height="200px"  alt="Image de restau">
          <img  class="card" src="images/terrasse.jpg" width="200px" height="200px" alt="Image de restau">
          <img  class="card" src="images/un-restaurant-avec-une.jpg" width="200px" height="200px" alt="Image de restau">
          <!-- width="200px" height="200px" -->

        </div>

    </header>

    <?php  ?>
    <?php
    include "pagesannexes/formcnx.php";

    //pour ajouter au panier
    if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
      $ajouter='';
    }
    else {
      $ajouter='onclick=connexions.connexion1();';
    }


     ?>
    <main >
      <br>
      <h1 id="meilleur" style="" >
        <span>MX MEALS</span> <br> Le meilleur restaurant de tout l'est
      </h1>
      <input type="range" orient="vertical" id="size" list="tickmarks" name="size" value="10" min="1" max="20" step="0.5" onchange="sizechange();">


       <?php
       $mets=mets();
       affichmenus($mets, $ajouter);
        ?>




        <p id="desrecettes" hidden>
            Et bien d'autres recettes culinaires adaptés à vos goûts!
        </p>

        <section id="sectionlisteplat">

        </section>
        <section id="sectionfig">
          <!--
          <figure >
             Onglet de visualisation aside droite
            <
            <img id="img1" src="images/IMG-20171120-WA0050.jpg" alt="un_plat">
            <figcaption>Des frites pttr</figcaption>
          </figure>-->
        </section>


    </main>
    <?php require 'pagesannexes/footer.php'; ?>
    <script type="text/javascript" src="<?=$lienjs ?>js1.js"></script>
    <script type="text/javascript" src="<?=$lienjs ?>js_ajoutp_async.js"></script>
  </body>
</html>
