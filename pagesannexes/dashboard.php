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
    <link rel="stylesheet" href="../css/styledashboard.css">
    <script type="text/javascript" src="<?=$lienjs ?>jsdemarrage.js"></script>

    <title> mx-meals</title>
  </head>
  <body >

    <header id="latete">
      <?php require 'nav.php'; ?>
      <div class="texteverif">
        <?php
        // var_dump($_POST);
         ?>
      </div>

    </header>
    <main >
      <?php
      include 'fonctions.php';
      $valeurs=dashboard();
       ?>
   <div class="elmtform">
     <div class="cle">Nom:</div>
     <div class="valeur"> <?php echo $valeurs["nom"]; ?> </div>
   </div>
   <div class="elmtform">
     <div class="cle">Prenom:</div>
     <div class="valeur"> <?php echo $valeurs["prenom"]; ?> </div>
   </div>
   <div class="elmtform">
     <div class="cle">Sexe:</div>
     <div class="valeur"> <?php echo $valeurs["sexe"]; ?> </div>
   </div>
   <div class="elmtform">
     <div class="cle">Email:</div>
     <div class="valeur"> <?php echo $valeurs["email"]; ?> </div>
   </div>
   <div class="elmtform">
     <div class="cle">Adresse:</div>
     <div class="valeur"> <?php echo $valeurs["adresse"]; ?> </div>
   </div>
   <div class="elmtform">
     <div class="cle">Birthday:</div>
     <div class="valeur"> <?php echo $valeurs["birthday"]; ?> </div>
   </div>
   <div class="elmtform">
     <div class="cle">Password:</div>
     <div class="valeur"> <?php echo $valeurs["password"]; ?> </div>
   </div>

   <div  class="elmtform" id="submit">
     <div class="cle">
       <button  id="deconnecter" name="button"><a href="deconnect.php" >SE DECONNECTER</a></button>
     </div>
     <div class="valeur">
       <button  id="annuler" type="button" name="button"><a href="./../index.php" >ANNULER</a></button>

     </div>

   </div>



</main>
<script type="text/javascript" src="<?=$lienjs ?>js1.js"></script>
<?php require 'footer.php'; ?>
</body>
</html>
