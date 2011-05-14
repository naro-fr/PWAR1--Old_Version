function effacer(elm) {
elm.style.opacity=0.9;
setTimeout(function() {elm.style.opacity=0.8},100);
setTimeout(function() {elm.style.opacity=0.7},200);
setTimeout(function() {elm.style.opacity=0.6},300);
setTimeout(function() {elm.style.opacity=0.5},400);
setTimeout(function() {elm.style.opacity=0.4},500);
setTimeout(function() {elm.style.opacity=0.3},600);
setTimeout(function() {elm.style.opacity=0.2},700);
setTimeout(function() {elm.style.opacity=0.1},800);
setTimeout(function() {elm.parentNode.removeChild(elm)},900);
}
function apparaitre(elm) {
elm.style.display="";
elm.style.visibility="";
elm.style.opacity=0.1;
setTimeout(function() {elm.style.opacity=0.2},100);
setTimeout(function() {elm.style.opacity=0.3},200);
setTimeout(function() {elm.style.opacity=0.4},300);
setTimeout(function() {elm.style.opacity=0.5},400);
setTimeout(function() {elm.style.opacity=0.6},500);
setTimeout(function() {elm.style.opacity=0.7},600);
setTimeout(function() {elm.style.opacity=0.8},700);
setTimeout(function() {elm.style.opacity=0.9},800);
setTimeout(function() {elm.style.opacity=""},900);
}
function disparaitre(elm) {
elm.style.opacity=0.9;
setTimeout(function() {elm.style.opacity=0.8},100);
setTimeout(function() {elm.style.opacity=0.7},200);
setTimeout(function() {elm.style.opacity=0.6},300);
setTimeout(function() {elm.style.opacity=0.5},400);
setTimeout(function() {elm.style.opacity=0.4},500);
setTimeout(function() {elm.style.opacity=0.3},600);
setTimeout(function() {elm.style.opacity=0.2},700);
setTimeout(function() {elm.style.opacity=0.1},800);
setTimeout(function() {elm.style.display="none"},900);
}
