

var bouttons=document.getElementsByClassName('bouttonajout');
for (var i = 0; i < bouttons.length; i++) {
  bouttons[i].addEventListener('click',cliqu);
}

function cliqu(e) {
  event.preventDefault();
  var id=this.id;
  var xhr=new XMLHttpRequest();


  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.response) {
        alert(this.response)
      }
      else {
        alert("N'a pas réussi a etre inséré au Panier!");
      }
      console.log(this.response);
    }

  }



  xhr.open("POST","pagesannexes/docs/ajoutpanier_sync.php",true);

  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("nom=ajout&id_boutton="+id);
  // xhr.send();

  return false;
}
