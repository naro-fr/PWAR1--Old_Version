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
var username;
function logon() {
username = document.getElementById('nom').value;
username = htmlspecialchars(username);
restorePrefs();
disparaitre(document.getElementById('logon'));
setTimeout(function() {apparaitre(document.getElementById('desktop'));apparaitre(document.getElementById('dock2'));},1000);
readSound('logonsound','etc/sounds/logon.mp3');
document.getElementById('username').innerHTML=username;
document.getElementById('nom').value="";
}
function htmlspecialchars(ch) {
ch = ch.replace(/&/g,"&amp;")
ch = ch.replace(/\"/g,"&quot;")
ch = ch.replace(/\'/g,"&#039;")
ch = ch.replace(/</g,"&lt;")
ch = ch.replace(/>/g,"&gt;")
return ch
}
function logout() {
savePrefs();
readSound('logout','etc/sounds/logout.mp3');
disparaitre(document.getElementById('desktop'));
disparaitre(document.getElementById('dock2'));
setTimeout(function () {apparaitre(document.getElementById('logon'));},1000);
setTimeout(function() {document.getElementById("windows").innerHTML="";},1000);
document.getElementById("racc1").style.left="";
document.getElementById("racc1").style.top="";
document.getElementById("racc2").style.left="";
document.getElementById("racc2").style.top="";
document.getElementById("desktop").style.backgroundImage="";
}
