var quants=document.getElementsByClassName('quant');
for (var i = 0; i < quants.length; i++) {
  quants[i].addEventListener('change',chang);
  quants[i].addEventListener("keydown",keyd);
}



function keyd(e) {
  var lettre=e.key;

  if (lettre<1 ||lettre>5) {
    alert("Des chiffres entre 1 et 5 exigés!")
    e.preventDefault();
    if (lettre<1) {
      this.value=1;
    }
    else {
      this.value=5;
    }

  }
}

function chang(e) {

  event.preventDefault();
  var id=this.id;
  var value=this.value;

  // if (value>5) {
  //   alert("Nombre MAX de commandes par MENU (5) atteint!")
  // }

    var xhr=new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.response) {
          alert(this.response)
          location.reload();
        }
        else {

          location.reload();
        }
        console.log(this.response);
      }
    }
    xhr.open("POST","docs/modif_quant.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("nom=modif&id_modif="+id+"&value="+value);
    return false;

}
