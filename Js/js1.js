
var menuc=document.getElementById("menucontextuel");
menuc.addEventListener('click',clickmenucontextuel);

var lienheader=document.querySelectorAll("#ulportrait .lienheader");
for (var i = 0; i < lienheader.length; i++) {
  lienheader[i].addEventListener('click',clickmenucontextuel);
}


function clickmenucontextuel() {
var o=document.getElementById("ulportrait");
  if (o.style.display=="flex") {
    o.style.display="none";
  }
  else {
    o.style.display="flex";
  }
}



var voulez=document.getElementsByClassName("voulezvousvraiment");
for (var i = 0; i < voulez.length; i++) {

  voulez[i].addEventListener('click',voulezvousvraiment);
}
function voulezvousvraiment(e){

  if (confirm("Voulez-vous vraiment "+ this.textContent+" ?")) {
    document.location.href="./../index.php";
  }

}

function isLower(str) {
    return /[a-z]/.test(str) && !/[A-Z]/.test(str);
}
function isChiffre(str) {
    return /[a-z]/.test(str) && !/[A-Z]/.test(str);
}

var nomins=document.getElementById('nom');
nomins.addEventListener("keydown",keynom);
function keynom(e) {
  var lettre=e.key;
/*
  if (isLower(lettre)) {
    alert("Seules les majuscules autorisées pour le NOM !")
    e.preventDefault();
  }
*/
  if (Number.isInteger(parseInt(lettre))) {
    alert("Pas de chiffres s'il vous plait !")
    e.preventDefault();
  }
}

if (document.getElementById('prenom')) {
  var prenomins=document.getElementById('prenom');
  prenomins.addEventListener("keydown",keyprenom);
  function keyprenom(e) {
    var lettre=e.key;

    if (Number.isInteger(parseInt(lettre))) {
      alert("Pas de chiffres s'il vous plait !")
      e.preventDefault();
    }
  }

}



function sizechange() {
  var size=document.getElementById('size').value;
  var newSize=size*10;
  newSize=newSize.toString()+"%";

  document.querySelector("html").style.fontSize=newSize;
  document.getElementById("labelsize").textContent="Taille de la police à"+" "+newSize;

}

function remettre_a_100() {
  document.getElementById('size').value="10";
  document.querySelector("html").style.fontSize="100%";
  document.getElementById("labelsize").textContent="Taille de la police à"+" 100%";
}

/*
document.getElementsByTagName('form').addEventListener("submit",function (e) {
  var mentions=document.getElementById('mentions');
  if (!mentions.checked) {
    alert("Activez les conditions générales d'utilisation SVP")
    e.preventDefault();

  }
})
*/
