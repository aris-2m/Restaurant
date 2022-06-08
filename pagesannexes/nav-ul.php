<?php
if (isset($page)) {
  $accueil="#latete";
  $menus="#meilleur";
  $panier="pagesannexes/panier.php";
}
else {
  $accueil='../index.php';
  $menus="../index.php";
  $panier="panier.php";
}
 ?>
<a href="<?=$accueil ?>" id="lien1"class="lienheader"> Accueil </a>

<hr>

<a href="<?=$menus ?>" id="lien2"class="lienheader"> Menus </a>
<hr>
<?php if (isset($_SESSION["email"]) && !empty($_SESSION["email"])): ?>
  <a href="<?=$panier ?>" id="lien3"class="lienheader"> Panier </a>
  <hr>
<?php endif; ?>

<a href="#footer" id="lien4"class="lienheader"> Contacts </a>
<hr>
<a href="#footer" id="lien5"class="lienheader"> Downloads </a>
