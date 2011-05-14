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
function boot() {
var loader = document.createElement("div");
loader.id="load";
document.body.appendChild(loader);;
loader.style.backgroundImage="url('boot/loader.gif')";
loader.title="Chargement...";
loader.style.display="none";
setTimeout(function() {apparaitre(loader)},500);
}
