
<div id="formulaire">

  <form class="" action="<?php $_SERVER["SCRIPT_NAME"] ?>" method="post">
    <div class="close"> <img id="deformulaire" onclick="deform();" src="<?=$lienicon ?>Close-icon.png" width="20px" height="20px"></div>
    <div id="titrecon">CONNEXION</div><br>

    <div class="elmtform">
      <label class="titres">Email</label><input  class="zones" type="email" name="email" value="" placeholder="Entrez votre email..." required>
    </div>

    <div class="elmtform">
      <label class="titres">Password</label><input class="zones"  type="password" name="password" value="" placeholder="Entrez votre mdp..." required>

    </div>
    <div class="elmtform" id="incorrect">
      
    </div>

    <div  class="elmtform" id="submit">
      <button type="submit" name="button" >LOGIN</button>
      <div class="">
        <?php

        $youdont="formins.php";

        if ( !empty($page) ){
          $youdont="pagesannexes/formins.php";
        }
          ?>

          <a href=<?=$youdont?>> You don't have an account? </a>


      </div>
    </div>


  </form>
</div>
