<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
       <title>PWAR</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="lib/libdisp.js"></script>
<script type="text/javascript" src="boot/boot.js"></script>
<script type="text/javascript" src="usr/sbin/fenetres.js"></script>
<script type="text/javascript" src="lib/libload.js"></script>
<script type="text/javascript" src="usr/lib/jquery.js"></script>
<script type="text/javascript" src="usr/lib/interface.js"></script>
<script type="text/javascript" src="usr/lib/libprefs.js"></script>
<script type="text/javascript" src="usr/lib/oXHR.js"></script>
<script type="text/javascript" src="sbin/logon.js"></script>
<script type="text/javascript" src="lib/sounds/script/soundmanager2.js"></script>
<script type="text/javascript" src="lib/libsounds.js"></script>
<link href="usr/lib/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
soundManager.url = 'lib/sounds/swf/';
soundManager.waitForWindowLoad = true;
var premier_son; // On le déclare avant, histoire qu'il soit une variable globale.
soundManager.onload = function() {
	premier_son = soundManager.createSound(
	{
		id : "premier_son",
		url : "etc/sounds/loading.mp3" // Attention pas de virgule ici !
	});
	premier_son.play();
	loadsound = true;
}
</script>
<style type="text/css">
html {
height:100%;
}

body {
height:100%;
padding:0;
margin:0;
overflow:hidden;
background:black;
font-family:Sans, Arial;
}

#load {
width:100%;
height:100%;
background-color:black;
background-position:center center;
background-repeat:no-repeat;
z-index:200;
}

#logon {
vertical-align:middle;
width:100%;
height:100%;
background-image:url('sbin/logon.png');
background-position:center center;
background-repeat:no-repeat;
z-index:199;
}

#logon div {
position:absolute;
top:50%;
left:50%;
margin-top:-200px;
margin-left:-200px;
width:400px;
height:400px;
padding:20px;
padding-top:200px;
}

#nom {
text-align:center;
width:100%;
}

#formlog {
width:360px;
text-align:center;
}

#soundmanager-debug {
display:none;
}

#desktop {
width:100%;
height:100%;
background-repeat:no-repeat;
background-position:center center;
z-index:20;
background-image:url('usr/wall/leopard.jpg');
}

#toolbar {
width:100%;
height:25px;
background-image:url(usr/img/toolbar.png);
z-index:190;
position:absolute;
top:0;
left:0;
-moz-box-shadow:0 0 1em;
box-shadow:0 0 1em;
}

.racc:hover span {
-moz-border-radius:10px;
border-radius:10px;
background-color:blue;
color:white;
box-shadow:0 0 2px blue;
-moz-box-shadow:0 0 2px blue;
}
.racc span {
height:40px;
}
.racc {
width:100px;
height:140px;
position:absolute;
cursor:default;
font-size:12px;
text-align:center;
text-shadow:0 0 2px;
-moz-text-shadow:0 0 2px;
}

#racc1 {
top:40px;
}
#racc2 {
top:195px;
}

#menu li:hover ul ul, #menu li.sfhover ul ul /* Sous-sous-listes lorsque la souris passe sur un élément de liste */
{
        left: -999em; /* On expédie les sous-sous-listes hors du champ de vision */
}

#menu li:hover ul, #menu li li:hover ul, #menu li.sfhover ul, #menu li li.sfhover ul  /* Sous-listes lorsque la souris passe sur un élément de liste ET sous-sous-lites lorsque la souris passe sur un élément de sous-liste */
{
        left: auto; /* Repositionnement normal */
        min-height: 0; /* Corrige un bug sous IE */
}
#menu, #menu ul /* Liste */     
{
        padding : 0; /* pas de marge intérieure */
        margin : 0; /* ni extérieure */
        list-style : none; /* on supprime le style par défaut de la liste */
        line-height : 21px; /* on définit une hauteur pour chaque élément */
}

#menu /* Ensemble du menu */
{
        font-weight : bold; /* on met le texte en gras */
        font-family : Arial; /* on utilise Arial, c'est plus beau ^^ */
        font-size : 15px; /* hauteur du texte : 12 pixels */
}

#menu a /* Contenu des listes */
{
	margin: 2px;
        display : block; /* on change le type d'élément, les liens deviennent des balises de type block */
        padding : 0; /* aucune marge intérieure */        
        color : #000; /* couleur du texte */
        text-decoration : none; /* on supprime le style par défaut des liens (la plupart du temps = souligné) */
}

#menu li /* Elements des listes */      
{ 
        float : left; 
        /* pour IE qui ne reconnaît pas "transparent" */
	z-index:2000;
}

/* IE ne reconnaissant pas le sélecteur ">" */
html>body #menu li
{
        border-right: 1px solid transparent ; /* on met une bordure transparente à droite de chaque élément */
}

#menu li ul /* Sous-listes */
{ 
        position: absolute; /* Position absolue */
        width: 144px; /* Largeur des sous-listes */
        left: -999em; /* Hop, on envoie loin du champ de vision */
        background-image: url("usr/img/menu.png");
}

#menu ul {
-moz-box-shadow:0 0 1em;
box-shadow:0 0 1em;
border-radius:5px;
-moz-border-radius:5px;
}

#menu li ul li /* Éléments de sous-listes */
{
        /* pour IE qui ne reconnaît pas "transparent" (comme précédemment) */
	width : 100%;
}

/* IE ne reconnaissant pas le sélecteur ">" */
html>body #menu li ul li                
{
        border-top : 1px solid transparent; /* on met une bordure transparente en haut de chaque élément */
}

#menu li ul ul 
{
        margin    : -22px 0 0 144px ; /* On décale les sous-sous-listes pour qu'elles ne soient pas au dessus des sous-listes */ 
        /* pour IE qui ne reconnaît pas "transparent" (comme précédemment) */
        border-left     : 1px solid #fff ; /* Petite bordure à gauche pour ne pas coller ... */      
}

/* IE ne reconnaissant pas le sélecteur ">" ... je me répète ;-) */
html>body #menu li ul ul                
{
        border-left     : 1px solid transparent ; /* on met une bordure transparente sur la gauche de chaque élément */
}

#menu a:hover /* Lorsque la souris passe sur un des liens */    
{
        color: #fff; /* On passe le texte en noir... */
        background-image: url("usr/img/tooltouch.png"); /* ... et au contraire, le fond en blanc */
}

#date_heure {
text-align: right;
}
.fenetre a {
color:blue;
}
</style>
   </head>
   <body onmousemove="deplacer_fenetre(event);redim_width(event);redim_height(event);" onmouseup="arreter_deplacement();stopredim();" oncontextmenu="creer_fenetre(event.clientX,event.clientY,300,300,'A propos de PWAR','sbin/about.html','inf');return false;" onbeforeunload="savePrefs();">
<script type="text/javascript">
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
boot();
lancer(endLoad);
lancer(function() {document.getElementById('nom').focus()});
//Si cette phrase s'affiche votre navigateur n'est pas compatible avec PWAR.
</script>
<div id="logon" style="display:none;">
<div>
<form id="formlog" onsubmit="logon();return false;">
<span>
Entrez votre pseudonyme :
</span>
<br /><br /><br /><br />
<input type="text" name="nom" id="nom"/><br />
<img src="sys/submit.png" onclick="logon()"/>
</form>
</div>
</div>
<!--[if IE]>
	<p style="color: red">
		<b>Attention, Ce Site n'est pas compatible avec internet explorer, nous vous invitons à télécharger un des navigateurs ci-dessous : <br />
		<a href="http://www.mozilla-europe.org/fr/firefox/">Mozilla Firefox</a><br />
		<a href="http://www.apple.com/safari/">Apple Safari</a><br />
		<a href="http://www.google.com/chrome">Google Chrome</a><br />
		</b>
	</p>
	<![endif]-->


<div id="desktop" style="display:none;">
<div id="windows"></div>
<div id="toolbar">
<ul id="menu">
        <li>
                <a href="#"> <img src="usr/img/toolpwar.png" alt="Pwar" title="Menu poire"/> </a>
                <ul>
                        <li><a id="fermersessbtn" onclick="logout()" href="#">Fermer la session</a></li>
                        <li><a href="#" onclick="creer_fenetre(100,50,500,350,'Applications disponibles','usr/bin/apps.html')">Applications</a></li>
			<li><a id="quitbtn" href="#" onclick="window.close()">Quitter</a></li>
			<li><a id="rebootbtn" href="#" onclick="document.location.replace('http://www.archive-host.com/compteur.php?url=http://sd-1.archive-host.com/membres/up/181181225348247935/pwar/index.html')">Redémarrer</a></li>
                </ul>
        </li>
        
        <li>
                <a href="#">PWAR</a>
                <ul>
                        <li><a href="#" onclick="creer_fenetre(100,100,300,300,'A propos de PWAR','sbin/about.html')">A propos</a></li>
                        <li><a href="#" onclick="creer_fenetre(100,100,400,200,'Télécharger les sources de PWAR','bin/download.html')">Télécharger</a></li>
                </ul>
        </li>
        
        <li>
                <a href="#">Outils</a>
                <ul>
                        <li><a href="#" onclick="creer_fenetre(100,100,500,400,'Terminal','term')">Terminal</a></li>
                        <li><a href="#" onclick="creer_fenetre(100,100,500,400,'App Builder','usr/bin/appbuilder.html')">App Builder</a></li>
                        <li><a href="#" onclick="creer_fenetre(100,100,500,400,'Préférences','sbin/prefs.html')">Préférences</a></li>
                </ul>
        </li>
        
        <li>
                <a href="#">Aide</a>
                <ul>
                        <li><a href="#" onclick="creer_fenetre(100,100,300,300,'A propos de PWAR','sbin/about.html')">A propos</a></li>
                        <li><a href="#" onclick="creer_fenetre(100,100,300,300,'Remerciements','bin/thanks.html')">Remerciements</a></li>
                        <li><a href="#" onclick="creer_fenetre(100,100,300,300,'Aide','bin/help.html')">Aide et assistance</a></li>
                </ul>
        </li>
        
</ul>
<div id="date_heure">
<span id="username">PWAR</span>
|
<span id="heure">
<script type="text/javascript" src="usr/lib/heure.js"></script>
</span>
</div>
</div>
<div id="exploredesk">
<div title="Applications disponibles" class="racc" id="racc1" ondblclick="creer_fenetre(100,50,500,350,'Applications disponibles','usr/bin/apps.html')" onmousedown="commencer_deplacement(event,document.getElementById('racc1'));" ><img src="usr/img/appsracc.png"/><span>Applications</span></div>
<div title="Ajouter un commentaire" class="racc" id="racc2" ondblclick="creer_fenetre(100,50,500,350,'Ajout de commentaire','http://ann.over-blog.com/ajout-commentaire.php?ref=2162720&ref_article=46806093')" onmousedown="commencer_deplacement(event,document.getElementById('racc2'));" ><img src="usr/img/comsracc.png"/><span>Commentaire</span></div>
</div>
</div>
<div id="preloadimages" style="position:absolute;top:200%;">
<img src="sbin/logon.png">
<img src="usr/wall/leopard.jpg">
<img src="usr/img/bas_centre.png">
<img src="usr/img/bas_droite.png">
<img src="usr/img/bas_gauche.png">
<img src="usr/img/mileu_droite.png">
<img src="usr/img/milieu_gauche.png">
<img src="usr/img/haut_centre.png">
<img src="usr/img/haut_droite.png">
<img src="usr/img/haut_gauche.png">
<img src="usr/img/fermer.png">
<img src="usr/img/maxi.png">
<img src="usr/img/mini.png">
</div>
<div class="dock" id="dock2" style="display:none">
  <div class="dock-container2">
  <a onclick="creer_fenetre(100,50,500,350,'Applications disponibles','usr/bin/apps.html')" class="dock-item2" href="#"><span>Applications</span><img src="usr/img/apps.png" alt="Apps" /></a>
  <a onclick="creer_fenetre(100,50,500,500,'Accueil PWAR','bin/home.html')" class="dock-item2" href="#"><span>Accueil PWAR</span><img src="usr/img/home.png" alt="Accueil" /></a> 
  <a onclick="creer_fenetre(200,100,300,200,'Contact','http://ann.over-blog.com/blog-contact.php?ref=2162720')" class="dock-item2" href="#"><span>Contact</span><img src="usr/img/email.png" alt="Contact" /></a> 
  <a class="dock-item2" href="#"><span>Documents</span><img src="usr/img/portfolio.png" alt="Portfolio" /></a> 
  <a class="dock-item2" href="#"><span>Musique</span><img src="usr/img/music.png" alt="Musique" /></a> 
  <a onclick="creer_fenetre(100,100,600,350,' Ajout de commentaire','http://ann.over-blog.com/ajout-commentaire.php?ref=2162720&ref_article=46806093')" class="dock-item2" href="#"><span>Ajout de commentaire</span><img src="usr/img/coms.png" alt="Coms" /></a> 
  <a class="dock-item2" href="#"><span>Histoire</span><img src="usr/img/history.png" alt="Historique" /></a> 
  <a class="dock-item2" href="#"><span>Calendrier</span><img src="usr/img/calendar.png" alt="Calendrier" /></a> 
  <a class="dock-item2" href="#"><span>Liens</span><img src="usr/img/link.png" alt="Liens" /></a> 
  <a class="dock-item2" onclick="creer_fenetre(100,100,270,80,'RSS','http://www.rss-image.com/981bd1d89fc0b5c02c997a9bb4dc980b.gif')" href="#"><span>RSS</span><img src="usr/img/rss.png" alt="RSS" /></a> 
  <a class="dock-item2" onclick="creer_fenetre(100,100,400,40,'RSS 2','http://www.rss-image.com/db5febc58bb3e3108f6dae880a89acc6.gif')" href="#"><span>RSS2</span><img src="usr/img/rss2.png" alt="RSS 2" /></a> 
  <a class="dock-item2" onclick="creer_fenetre(100,100,400,200,'Télécharger les sources de PWAR','bin/download.html')" href="#"><span>Télécharger les sources</span><img src="usr/img/boite.png" alt="Download" /></a>
  </div>
</div>
<!--[if IE]>
	<p style="color: red">
		<b>Attention, Ce Site n'est pas compatible avec internet explorer, nous vous invitons à télécharger un des navigateurs ci-dessous : <br />
		<a href="http://www.mozilla-europe.org/fr/firefox/">Mozilla Firefox</a><br />
		<a href="http://www.apple.com/safari/">Apple Safari</a><br />
		<a href="http://www.google.com/chrome">Google Chrome</a><br />
		</b>
	</p>
	<![endif]-->
<!--dock menu JS options -->
<script type="text/javascript">
	heureload();
	$(document).ready(
		function()
		{
			$('#dock2').Fisheye(
				{
					maxWidth: 60,
					items: 'a',
					itemsText: 'span',
					container: '.dock-container2',
					itemWidth: 40,
					proximity: 80,
					alignment : 'left',
					valign: 'bottom',
					halign : 'center'
				}
			)
		}
	);

</script>
   </body>
</html>
