var retraits=document.getElementsByClassName('retirer');
for (var i = 0; i < retraits.length; i++) {
  retraits[i].addEventListener('click',click_retirer);
}
function click_retirer(e) {
  event.preventDefault();
  var id=this.id;
  var xhr=new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.response) {
        alert(this.response)
        location.reload();
      }
      else {
        // alert("MENU"+id[id.length-1]+" retiré avec succcès du panier");
        location.reload();
      }
      console.log(this.response);
    }
  }
  xhr.open("POST","docs/retrait_panier_sync.php",true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("nom=retrait&id_retirer="+id);
  return false;
}
