
<?php
echo "bonkour";

try {
  $servere="localhost";
  $logine="root";
  $passe="";
  $connexion=new PDO("mysql:host=$servere;dbanme=restaurant", $logine, $passe);
  $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // $requete="INSERT INTO menu(idMenu,nomMenu,prix,image,texte)
  // VALUES('ass','ar',50,'rr','ff')";
  // $connexion->query($requete);


} catch (PDOException $e) {
  echo "NON";
}

 ?>
