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
var loadsound;
function readSound(i,u) {
if(loadsound) {
var sound = soundManager.createSound({id:i,url:u,onfinish:function() {soundManager.destroySound(sound);}});
sound.play();
} else {
setTimeout(function() {readSound(i,u)},1000);
}
}
