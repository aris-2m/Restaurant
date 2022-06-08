
<?php

// Pour le click pour avoir le dashboard
if (strpos($_SERVER["SCRIPT_NAME"],"index.php")) {
  $ouvrir='controlpanel("pagesannexes/dashboard.php");';
}
else {
  $ouvrir='controlpanel("dashboard.php");';
}

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {


  $clicki="onclick=$ouvrir";

  if ($_SESSION["sexe"]=="M") {
    $icone="Male2.png";
  }
  else {
    $icone="Female2.png";
  }
}
else {


  if ( isset($_POST) && !empty($_POST)){

  $recu=verifconnected($_POST);

  if (isset($recu) && !empty($recu)) {


    if (strpos($_SERVER["SCRIPT_NAME"],"forminsreussie.php")) {
      if ($tableau["texte"]=="Cet email est déjà lié à un autre compte !") {
        $icone="im.png";
        $ouvrir='controlpanel("formins.php");';

        $clicki="onclick=$ouvrir";

      }

    }
    else {
      $_SESSION["idUser"]=$recu["idUser"];
      $_SESSION["email"]=$recu["email"];
      $_SESSION["prenom"]=$recu["prenom"];
      $_SESSION["sexe"]=$recu["sexe"];

          $clicki="onclick=$ouvrir";
          if ($_SESSION["sexe"]=="M") {
            $icone="Male2.png";
          }
          else {
            $icone="Female2.png";
          }
    }

  }
  else {
    $icone="im.png";
    $clicki="onclick='connexions.connexion1();'";

      echo "<script type='text/javascript'>
      connexion_permananent();
      </script>";


  }
}
else {
  // echo "Login";
  $icone="im.png";
  $clicki="onclick='connexions.connexion1();'";


}
}


 ?>
<nav id="vivo">
  <img onclick = "clicklogo();" id="logo" src="<?=$lienlogo ?>MX2.png">

  <ul class="nav-ul" id="ullandscape">
    <?php require "nav-ul.php" ?>
  </ul>

  <img  id="menucontextuel" src="<?=$lienicon ?>Apps-yakuake-icon.png">

  <div id="connect" <?=$clicki ?>>
    <span id="lui" >
      <?php
      if(isset($_SESSION["email"]) && !empty($_SESSION["email"] )) {
        echo $_SESSION["prenom"];
      }
      else {
        echo"Login";
      }

        ?>
    </span>

    <img id="emoji"src="<?=$lienicon ?>/<?=$icone ?>" >

  </div>

</nav>

<div id="lmf">
</div>

<ul class="nav-ul" id="ulportrait">
  <?php
  require "nav-ul.php"
  ?>
</ul>
