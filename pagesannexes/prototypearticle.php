<article class="plats">

  <details open>
    <summary><?=$mets[$i]["nomMenu"]?>  <span class="prixmenu"><?=$mets[$i]["prixMenu"]." DHs"?></span></summary>
    <p>
      <img class="platfloat"src="images/<?=$mets[$i]["image"]  ?>" width="200px" height="200px" alt="">
      <p>
        <?php
        $a=$mets[$i]['texte'];
        $texte=fopen("fichiers/$a","r");
        if (!$texte) {
          exit("Erreur d'ouverture du fichier");
        }
        while (!feof($texte)) {
          echo fgetc($texte);
        }
        fclose($texte);
         ?>
      </p>

    </p>
    <button <?=$ajouter; ?> type="button"name="bt<?=$i?>">AJOUTER AU PANIER</button>
    <?php
    // INSERT INTO `ajout`(`idUser`, `idMenu`, `quantitéAjout`, `prixAjout`) VALUES (107,2,4,20)

     ?>
  </details>

</article>
<br>
