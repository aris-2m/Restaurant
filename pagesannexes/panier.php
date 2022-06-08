<?php

session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
    // last request was more than 60 minutes ago (3600 seconds)
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
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

    <link rel="stylesheet" href="../css/styleformcnx.css">
    <link rel="stylesheet" href="../css/stylesummary.css">

    <link rel="stylesheet" href="../css/stylefooter.css">
    <link rel="stylesheet" href="../css/stylepanier.css">

    <script type="text/javascript" src="<?=$lienjs ?>jsdemarrage.js"></script>

    <title> mx-meals</title>
  </head>
  <body >

    <header id="latete">
      <?php require 'nav.php'; ?>
      <?php require 'fonctions.php'; ?>
    </header>

    <main>
        <?php include 'formcnx.php'; ?>


        <div id="formulaire2">
          <form class="" id="formpanier" method="get">
            <fieldset id="choixaction" >
            <legend>
              <select class="" name="choixaction" size="1" id="zoneselection" >
                <option value="panier" id="op">Panier</option>
                <option value="historique" >Historique des Commandes</option>
              </select>
            </legend>
            <div class="">
              <section id="panier" class="visible">
                <span id="titrepanier">PANIER</span><br>

                <?php
                $panier=panier();
                $nb_affich=affichpanier($panier);
                 ?>
                 <div class="baspanier">
                   <?php if ($nb_affich==0): ?>
                     <?php if (isset($_SESSION["commande_reussie"]) && !empty($_SESSION["commande_reussie"])): ?>
                       <?php
                       echo $_SESSION["commande_reussie"];
                       unset($_SESSION["commande_reussie"]);
                        ?>
                     <?php else: ?>
                       <span>Aucun article ajouté</span>
                     <?php endif; ?>
                   <?php endif; ?>
                   <?php if ($nb_affich==1): ?>
                   <div class="">
                     <span id="total">TOTAL:</span>
                     <span>
                       <?php
                       $panier=panier();
                       echo calctotal($panier)." Dhs ";
                        ?>
                     </span>
                   </div>
                    <button type="button" name="button" id="buttoncommander">SIMULER COMMANDE</button>
                   <?php endif; ?>


                 </div>

              </section>

              <section id="historique" class="invisible">
                <span id="titrehistorique">HISTORIQUE</span><br>

                <?php historique(); ?>

                <!-- <legend>Vous noterez votre commade ici:</legend>
                <textarea required id="story" name="story" rows="2" cols="35"> </textarea>
                <button type="submit" name="button">ENVOYER</button><br>
                <button type="button" name="button"><a href="./../index.php" >ANNULER</a></button> -->

                <!-- <div class="elmtformu">
                  <label class="titres">Quantité:</label>
                  <input type="range" name="" value="1" min="1" max="5" step="1">
                  <input type="number" name="" value="1" min="1" max="5" step="1" required>
                </div> -->

              </section>

            </div>

            </fieldset>

          </form>

        </div>


      </div>

</main>
<div class="bas">

</div>

<?php

require"footer.php";
 ?>
</body>
<script type="text/javascript" src="<?=$lienjs ?>js1.js"></script>
<script type="text/javascript" src="<?=$lienjs ?>jspanier.js"></script>
<script type="text/javascript" src="<?=$lienjs ?>retirer_menu.js"></script>
<script type="text/javascript" src="<?=$lienjs ?>js_modif_quant.js"></script>
</html>
