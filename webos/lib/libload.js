/*
 ________  __        __        __      __      ________
 |   _   \ \ \      /  \      / /     /  \     |       \
 |  |_|  |  \ \    / /\ \    / /     / /\ \    |  |_|  |
 |   ____/   \ \  / /  \ \  / /     / /__\ \   |     __/
 |   |        \ \/ /    \ \/ /     / _____  \  |       \
 |___|         \__/      \__/     /_/      \_\ |___|\___\

Premier Web Operating System Arrogant Réussi
http://pwar.over-blog.com

*/
var loadpage=false;
function endLoad() {
disparaitre(document.getElementById('load'));
setTimeout(function(){apparaitre(document.getElementById('logon'))},1000);
}

function addEvent(obj,event,fct){
     if(obj.attachEvent)
        obj.attachEvent('on' + event,fct);
     else
        obj.addEventListener(event,fct,true);
}
function lancer(fct) {
    addEvent(window, "load", fct);
}
