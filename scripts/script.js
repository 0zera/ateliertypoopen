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

// le background derrière les popups qui doit changer d'opacité
var bg = document.getElementsByTagName("main")[0];

///////// Afficher un popup chaque fois qu'on clique sur un span.popup ////////

var pops = document.body.getElementsByClassName("popup");

function showPopup(clean) {
  var popup;
  if (!popup) popup = new DialogBox(clean);
  popup.showDialog();

  // corriger la position sur desktop -> mettre une position aléatoire
  if(window.innerWidth >= 600) {
    elem = document.getElementById(clean);

    elemW = parseInt(elem.style.width);
    leftPos = 20 + Math.floor(Math.random() * (window.innerWidth - elemW - 50)) + 'px';
    elem.style.left = leftPos;

    if (window.innerHeight >= 700) {
      elemH = parseInt(elem.clientHeight);
      topPos = 20 + Math.floor(Math.random() * (window.innerHeight - elemH - 50)) + 'px';
      elem.style.top = topPos;
    }

  }
}

function openPopup(el) {
  elemId = el.target.innerHTML;
  clean = elemId.toLowerCase().replace(/^l\'/g, '').replace(/ .*/, '');
  // bg.style.opacity = .4;
  showPopup(clean);
}

[...pops].forEach(function(pop) {
  pop.addEventListener("click", openPopup);
});

var dialogs = document.body.querySelectorAll('.dialog');
var closeButtons = document.body.querySelectorAll('.dialog button[name="close"]');

// Quand on clique sur un bouton fermer, checke s'il y a d'autres popups ouverts
function checkDisplay(event) {
  parentDialog = event.target.parentElement.parentElement;
  // console.log(parentDialog);

  // parentDialog.style.display = "none";

  var displayed = [];
  [...dialogs].forEach(function(dial) {
    displayed.push(dial.style.display);
  });

  // console.log(displayed);

  if (!displayed.includes("block")) {
    bg.style.opacity = 1;
  }
}

[...closeButtons].forEach(function(cbut) {
  // cbut.addEventListener("click", checkDisplay, cbut);
});
