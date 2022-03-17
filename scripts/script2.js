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
