//let fonts = ["'atrakt'","'Bright Hope'","'Carlos'", "'Ceefax'", "'Fonte variable'", "'Gothic Revival 1'", "'La Curieuse'", "'Notam Standard'","'TOAD.22.12'","'VG_Aldiviva_07'","'Ziggy Sans'"];

let fonts = ["'L10'","'atrakt'","'atrakt'","'Bright Hope'","'Carlos'", "'Gothic Revival 1'","'VG_Aldiviva_07'","'Ziggy Sans'"];

let fontsTotal = fonts.length;
let y = 0;
document.body.style.fontFamily = fonts[y];

let button = document.querySelector("#switchfont");

button.addEventListener('click', event => {


y++;
if(y >= fontsTotal){
  y = 0;
}
document.body.style.fontFamily = fonts[y];

});

// le background derroère les popups qui doit changer d'opacité
var bg = document.getElementsByTagName("main")[0];

///////// Afficher un popup chaque fois qu'on clique sur un span.popup ////////

var pops = document.body.getElementsByClassName("popup");

function showPopup(clean) {
  var popup;
  if (!popup) popup = new DialogBox(clean);
  popup.showDialog();
}

function openPopup(el) {
  elemId = el.target.innerHTML;
  clean = elemId.toLowerCase().replace(/^l\'/g, '').replace(/ .*/, '');
  bg.style.opacity = .4;
  showPopup(clean);
}

[...pops].forEach(function(pop) {
  pop.addEventListener("click", openPopup);
});


var dialogs = document.body.querySelectorAll('.dialog');
var closeButtons = document.body.querySelectorAll('.dialog button[name="close"]');
// Quand on clique sur un bouton fermer, checke s'il y a d'autres popups ouverts
function checkDisplay() {
  var displayed = [];
  [...dialogs].forEach(function(dial) {
    displayed.push(dial.style.display);
  });
  // console.dir(displayed);
  if (!displayed.includes("block")) {
    bg.style.opacity = 1;
  }
}

[...closeButtons].forEach(function(cbut) {
  cbut.addEventListener("click", function() {
    checkDisplay();
  })
});
