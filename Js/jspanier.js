var zoneselect=document.getElementById('zoneselection');
zoneselect.addEventListener('change',changin);

function changin(e) {

  var target = e.target || e.srcElement;

  var amontrer=document.getElementById(target.value);
  amontrer.classList.remove("invisible");
  amontrer.classList.add("visible");

  var autres=amontrer.parentElement.children;
  for (var i = 0; i < autres.length; i++) {
    if (autres[i].id!=amontrer.id) {
      autres[i].classList.add("invisible");
      autres[i].classList.remove("visible");
    }

  }
}
var commander=document.getElementById('buttoncommander');
commander.addEventListener('click',commande);

function commande() {

  document.location="docs/commander.php";
}
