var zindex=5;
var fenetre_deplacee=0;
var fenetre_deplacee_difx=0;
var fenetre_deplacee_dify=0;
var nbfen=0;
var redim_x=0;
var redim_y=0;
var fenredimx=0;
var fenredimy=0;

function creer_fenetre(left,top,width,height,titre,content,type,cont) {
        var fenetre = document.createElement("div");
	fenetre.style.diplay="none";
        fenetre.className="fenetre"; //On donne un attribut class � cette div
        fenetre.style.left=left+"px"; //Modification de l'attribut left du style de notre div
        fenetre.style.top=top+"px";
        fenetre.style.width=width+"px";
        fenetre.style.height=height+"px";
		addEvent(fenetre,"mousedown",function (){premier_plan(fenetre)});
       
        //On cr�� de la m�me mani�re la div "haut":
        var haut = document.createElement("div");
        haut.className="haut";
		addEvent(haut,"mousedown",function (event){commencer_deplacement(event,fenetre)});
		addEvent(haut,"dblclick",function () {min_max(fenetre)})
        //On cr�� ensuite les trois div qui seront dedans:
        var haut_gauche = document.createElement("div");
        haut_gauche.className="haut_gauche";
        var haut_droite = document.createElement("div");
        haut_droite.className="haut_droite";
        var haut_centre = document.createElement("div");
        haut_centre.className="haut_centre";

	var imgmenu = document.createElement("span");
	imgmenu.className="imgmenu";

	var imgferm = document.createElement("a");
	imgferm.href="#";
	imgferm.className="imgferm";
	var ferm = document.createElement("img");
	ferm.src="usr/img/fermer.png";
	ferm.className="ferm";
	imgferm.appendChild(ferm);
	var fermt = document.createElement("img");
	fermt.title="Fermer";
	fermt.src="usr/img/fermert.png";
	fermt.className="fermt";
	imgferm.appendChild(fermt);
	addEvent(imgferm,"click",function() {closer(fenetre)})

	var imgmax = document.createElement("a");
	imgmax.href="#";
	imgmax.className="imgmax";
	var maxi = document.createElement("img");
	maxi.src="usr/img/maxi.png";
	maxi.className="maxi";
	imgmax.appendChild(maxi);
	var maxit = document.createElement("img");
	maxit.title="Redimensionner";
	maxit.src="usr/img/maxit.png";
	maxit.className="maxit";
	imgmax.appendChild(maxit);
	addEvent(imgmax,"click",function() {min_max(fenetre)});

	var imgmin = document.createElement("a");
	imgmin.href="#";
	imgmin.className="imgmin";
	var mini = document.createElement("img");
	mini.src="usr/img/mini.png";
	mini.className="mini";
	imgmin.appendChild(mini);
	var minit = document.createElement("img");
	minit.title="Reduire";
	minit.src="usr/img/minit.png";
	minit.className="minit";
	imgmin.appendChild(minit);
	addEvent(imgmin,"click",function() {minimize_fen(fenetre)});

	imgmenu.appendChild(imgferm);
	imgmenu.appendChild(imgmin);
	imgmenu.appendChild(imgmax);
	haut_centre.appendChild(imgmenu);

	var titref = document.createTextNode(titre);
	haut_centre.appendChild(titref);
        //Puis on les ins�re une par une dans notre bloc "haut":
        haut.appendChild(haut_gauche);
        haut.appendChild(haut_droite);
        haut.appendChild(haut_centre);
        //On ins�re le tout (la div "haut" et les trois div � l'int�rieur) dans le bloc "fenetre":
        fenetre.appendChild(haut);

        //On fait de m�me pour la div "milieu"
        var milieu = document.createElement("div");
        milieu.className="milieu";
        var milieu_gauche = document.createElement("div");
        milieu_gauche.className="milieu_gauche";
        var milieu_droite = document.createElement("div");
        milieu_droite.className="milieu_droite";
	addEvent(milieu_droite,"mousedown",function() {comm_redim_width(fenetre)});
        var milieu_centre = document.createElement("div");
        milieu_centre.className="milieu_centre";
        milieu.appendChild(milieu_gauche);
        milieu.appendChild(milieu_droite);
        milieu.appendChild(milieu_centre);
        fenetre.appendChild(milieu);
       
        //On fait de m�me pour la div "bas
        var bas = document.createElement("div");
        bas.className="bas";
        var bas_gauche = document.createElement("div");
        bas_gauche.className="bas_gauche";
	addEvent(bas_gauche,"mousedown",function() {comm_redim_height(fenetre)});
        var bas_droite = document.createElement("div");
        bas_droite.className="bas_droite";
	addEvent(bas_droite,"mousedown",function() {comm_redim_height(fenetre);comm_redim_width(fenetre);});
        var bas_centre = document.createElement("div");
        bas_centre.className="bas_centre";
	addEvent(bas_centre,"mousedown",function() {comm_redim_height(fenetre)});
        bas.appendChild(bas_gauche);
        bas.appendChild(bas_droite);
        bas.appendChild(bas_centre);
        fenetre.appendChild(bas);

	premier_plan(fenetre); //On met au premier plan notre fen�tre

	if( ! type) {
		document.getElementById('windows').appendChild(fenetre);
	} else if(type == 'inf') {
		document.body.appendChild(fenetre);
	} else if(type == 'alert') {
		document.body.appendChild(fenetre);
		milieu_centre.innerHTML=content;
	}
        nbfen++;
	if(content == 'term') {
	initTerm(milieu_centre);
	} else if(content == "vwebox") {
		initVirtualBox(milieu_centre);
	} else {
		if(type != 'alert') {
			var xhr = getXMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					milieu_centre.innerHTML=xhr.responseText;
				}
			};

			var page = encodeURIComponent(content);
	
			xhr.open("GET", "app.php?app=" + page , true);
			xhr.send(null);
		}
	}
	apparaitre(fenetre);
}

function closer(fenetre)
{
effacer(fenetre);
nbfen--;
}

function initTerm(e) {
e.style.background="black";
e.style.color="white";
var sortie = document.createElement("div");
var entree = document.createElement("form");
e.appendChild(sortie);
e.appendChild(entree);
var input = document.createElement("input");
entree.innerHTML=username + "@" + machine + ": $ ";
entree.appendChild(input);
input.type="text";
input.style.width="30%";
addEvent(entree,"submit",function() {term(input,sortie);return false;});
input.style.border="0";
input.style.background="black";
input.style.color="white";
}

var machine = document.location;

function term(e,s) {
var res;
switch(e.value) {
case 'help':
res="help : Affiche cette aide<br/>clear : Efface le tampon<br />reboot : Redemarre PWAR<br />logout : ferme la session<br />ageofwar : ouvre Age of War<br />term : ouvre une nouvelle instance du terminal<br />download : ouvre la fenetre de telechargement de PWAR";
break;
case 'logout':
res="Fermeture de session...";
logout();
break;
case 'ageofwar':
res="Ouverture d'Age of War...";
creer_fenetre(100,100,500,400,'Age of War','usr/bin/ageofwar.html');
break;
case 'term':
res="Ouverture d'une nouvelle instance du terminal";
creer_fenetre(100,100,500,400,'Terminal','term');
break;
case 'download':
res="Ouverture de la fenetre de telechargement...";
creer_fenetre(100,100,400,200,'Telecharger les sources de PWAR','bin/download.html');
break;
case 'clear':
s.innerHTML="";
e.value="";
return;
break;
case 'reboot':
res="Reboot...";
document.location.reload();
break;
default:
res="Commande introuvable";
}
s.innerHTML+=username + "@" + machine + ": $ " + e.value + "<br />" + res + "<br />";
e.value="";
}

function premier_plan(fenetre) {
        zindex++; //On incr�mente la variable globale
        fenetre.style.zIndex=zindex; //On affecte sa valeur au z-index de la fenetre concern�e
}

function min_max(fenetre)
{
  if ( ! fenetre.max )
  {
if (fenetre.min) {
minimize_fen(fenetre);
}
    fenetre.max = true;
    fenetre.oldTop = fenetre.style.top;
    fenetre.oldLeft = fenetre.style.left;
    fenetre.oldWidth = fenetre.style.width;
    fenetre.oldHeight = fenetre.style.height;

    fenetre.style.top = '25px';
    fenetre.style.left = '0px';
    fenetre.style.right = '0px';
    fenetre.style.width = '100%';
    fenetre.style.height = 'auto';
    fenetre.style.bottom = '85px';
  }
  else
  {
    fenetre.max = false;
    fenetre.style.top = fenetre.oldTop;
    fenetre.style.left = fenetre.oldLeft;
    fenetre.style.width = fenetre.oldWidth;
    fenetre.style.height = fenetre.oldHeight;
  }
}

function minimize_fen(fenetre) {
if ( ! fenetre.min)
{
if (fenetre.max) {
min_max(fenetre);
}
fenetre.min = true;
fenetre.oldeHeight = fenetre.style.height;
fenetre.style.height = 0;
} else {
fenetre.min = false;
fenetre.style.height = fenetre.oldeHeight;
}
}


function arreter_deplacement() {
        fenetre_deplacee=0; //La variable vaut 0
}

function deplacer_fenetre(ev) {
        if(fenetre_deplacee!=0) {
                var souris=mouseCoords(ev);
                fenetre_deplacee.style.left=(souris.x-fenetre_deplacee_difx)+'px'; //On soustrait l'abscisse du curseur par rapport au coin gauche de la fen�tr
                fenetre_deplacee.style.top=(souris.y-fenetre_deplacee_dify)+'px'; //On fait de m�me avec l'ordonn�e
        }
}

function commencer_deplacement(ev,fenetre) {
if( ! fenetre.max) {
        fenetre_deplacee=fenetre; //On d�fini quelle fen�tre est en cours de d�placement
        old_mouseCoords=mouseCoords(ev); //On r�cup�re la position de la souris
        old_windowCoords=getPosition(fenetre); //Et la position de notre fen�tre
        //On stocke les diff�rences dans les variables globales
        fenetre_deplacee_difx=old_mouseCoords.x-old_windowCoords.x;
        fenetre_deplacee_dify=old_mouseCoords.y-old_windowCoords.y;
}
}

function mouseCoords(ev){
        if(ev.pageX || ev.pageY){
                return {x:ev.pageX, y:ev.pageY};
        }
        return {
                x:ev.clientX + document.body.scrollLeft - document.body.clientLeft,
                y:ev.clientY + document.body.scrollTop  - document.body.clientTop
        };
}

function getPosition(e){
        var left = 0;
        var top  = 0;
        while (e.offsetParent){
                left += e.offsetLeft;
                top  += e.offsetTop;
                e     = e.offsetParent;
        }
        left += e.offsetLeft;
        top  += e.offsetTop;
        return {x:left, y:top};
}

function comm_redim_width(o) {
if( ! o.max) {
if( ! o.min) {
redim_x=getPosition(o).x;
fenredimx=o;
}
}
}

function redim_width(e) {
if(fenredimx) {
fenredimx.style.width=mouseCoords(e).x-redim_x + "px";
}
}

function comm_redim_height(o) {
if( ! o.max) {
if( ! o.min) {
redim_y=getPosition(o).y+37;
fenredimy=o;
}
}
}

function redim_height(e) {
if(fenredimy) {
fenredimy.style.height=mouseCoords(e).y-redim_y + "px";
}
}

function stopredim() {
fenredimx=0;
fenredimy=0;
}
