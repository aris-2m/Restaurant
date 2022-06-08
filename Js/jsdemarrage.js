function connexion_permananent() {

  let x = document.cookie;
  if (x.includes("connexion_permananent_oui")) {
    document.addEventListener('DOMContentLoaded', connexions.connexion2);
    // DOMContentLoaded
  }
}


var connexions={

  connexion1:function connexion() {
    if (document.location.href.indexOf("formins.php")==-1) {
      document.cookie = "connexion=connexion_permananent_oui; path=/";
      var a=document.getElementById("formulaire");
      a.style.display="flex";

      document.querySelector('main').style.filter="brightness(0.7)";
      document.querySelector('header').style.filter="brightness(0.7)";
      document.querySelector('main').style.filter="blur(10px)";
      document.querySelector('header').style.filter="blur(10px)";
    }
  },

  connexion2:function() {

    connexions.connexion1();
    var aa=document.getElementById("incorrect");
    aa.innerHTML="Données entrées incorrectes! Veuillez les revérifier";
    aa.style.display="block";

  },
}
function deform() {

  document.cookie = "connexion=connexion_permananent_non; path=/";

  location.reload();

}


function clicklogo() {
  var doc=document.location.href;
  if (doc.includes("pagesannexes") ) {

    document.location.href="../index.php";

  }
  else {

    document.querySelector('*').scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth'
  });
  }
}







function controlpanel(lien) {

    document.location.href=lien;

}
