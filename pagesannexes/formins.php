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
    <link rel="stylesheet" href="../css/styleformins.css">
    <link rel="stylesheet" href="../css/stylefooter.css">
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
    <section id="principal">
      <main >
        <div id="formulaire">
   <form class="" action="forminsreussie.php" method="post">

     <div id="titrecon">INSCRIPTION</div><br>
     <div class="elmtform">
       <label class="titres">Nom:</label><input class="zones" type="text" name="nom" id="nom" value="" placeholder="Entrez votre nom..." required>
     </div>
     <div class="elmtform">
       <label class="titres">Prenom:</label><input id="prenom" class="zones" type="text" name="prenom" value="" placeholder="Entrez votre prénom..." required>
     </div>
     <div class="elmtform">
       <label class="titres">Sexe:</label>
       <div class="zones" id="zoneradio">
         <div class="intradio">
           <input checked type="radio" name="sexe" value="M" ><label for="Male">Male</label>
         </div>
         <div class="">
           <input type="radio" name="sexe" value="F" ><label for="Female">Female</label>
         </div>

       </div>

     </div>
     <div class="elmtform">
       <label class="titres">Email:</label><input  class="zones" type="email" name="email" value="" placeholder="Entrez votre email..." required>
     </div>
     <div class="elmtform">
       <label class="titres">Adresse:</label><input  class="zones" type="text" name="adresse" value="" placeholder="Entrez votre ville..." required>
     </div>
     <div class="elmtform">
       <label class="titres">Birthday:</label><input  class="zones" type="date" name="birthday" value="" placeholder="Entrez votre date d'anniversaire..." required>
     </div>
     <div class="elmtform">
       <label class="titres">Password:</label><input class="zones"  type="password" name="password" value="" placeholder="Entrez votre mdp..." required>
     </div>
     <div class="elmtform2">
       <input class="zones"  type="checkbox" id="mentions" name="mentions" value="Accepté"  required><label for="mentions" id="accepte">J'accepte les mentions légales d'utilisation</label>
     </div>
     <div  class="elmtform" id="submit">

       <button id="annuler" class="voulezvousvraiment" type="button" name="button">ANNULER</button>
       <button type="submit" id="envoyer" name="button">SUBMIT</button>
     </div>

     <div class="elmtform" id="messagesubmit">
       <p id="error" hidden>Please fill out all fields.</p>
       <p id="thanks" hidden>Your data has been received. Thanks!</p>
     </div>
   </form>

  </div>
  </main>

    </section>


<script type="text/javascript" src="<?=$lienjs ?>js1.js"></script>
<?php require"footer.php"; ?></body>
</html>
