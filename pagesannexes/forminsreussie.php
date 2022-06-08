<?php
session_start();

 ?>
<?php

$lienimages="../images/";
$lienlogo="../logo/";
$lienicon="../icon/";
$liencss="../css/";
$lienjs="../Js/";
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" http-equiv="refresh" content="400">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/stylenav.css">
    <link rel="stylesheet" href="../css/styleheader_and_nav_annexes.css">
    <link rel="stylesheet" href="../css/stylepage.css">
    <link rel="stylesheet" href="../css/stylefooter.css">
    <link rel="stylesheet" href="../css/styleforminsreussie.css">
    <script type="text/javascript" src="<?=$lienjs ?>jsdemarrage.js"></script>

    <title> mx-meals</title>
  </head>
  <body >


    <header id="latete">

      <?php
      require "fonctions.php";

      $tableau=formulaireins($_POST);
      require 'nav.php'; ?>

    </header>
    <main >

      <div class="bienvenue">
        <?php
        echo $tableau["texte"];
        // var_dump($tableau["texte"]);
        ?>

          <p id="bienvenue2"> <?php echo $_POST["nom"]." ".$_POST["prenom"];?> </p>

           <button id="retour" type="button"> <a href="<?=$tableau["allersur"] ?>"> RETOUR</a></button>
      </div>
    </main>

<?php require"footer.php"; ?>
<script type="text/javascript" src="<?=$lienjs ?>js1.js"></script>
</body>
</html>
