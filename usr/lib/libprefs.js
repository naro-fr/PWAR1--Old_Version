function setCookie(sName, sValue) {
        var today = new Date(), expires = new Date();
        expires.setTime(today.getTime() + (365*24*60*60*1000));
        document.cookie = sName + "=" + sValue + ";expires=" + expires.toGMTString();
}

function getCookie(sName) {
        var cookContent = document.cookie, cookEnd, i, j;
        var sName = sName + "=";
 
        for (i=0, c=cookContent.length; i<c; i++) {
                j = i + sName.length;
                if (cookContent.substring(i, j) == sName) {
                        cookEnd = cookContent.indexOf(";", j);
                        if (cookEnd == -1) {
                                cookEnd = cookContent.length;
                        }
                        return decodeURIComponent(cookContent.substring(j, cookEnd));
                }
        }       
        return null;
}
function savePrefs() {
setCookie(username + "raccuntop",document.getElementById("racc1").style.top);
setCookie(username + "raccunleft",document.getElementById("racc1").style.left);
setCookie(username + "raccdeuxtop",document.getElementById("racc2").style.top);
setCookie(username + "raccdeuxleft",document.getElementById("racc2").style.left);
setCookie(username + "deja","oui");
setCookie(username + "background",document.getElementById("desktop").style.backgroundImage);
}
function restorePrefs() {
	if(getCookie(username + "deja") != "oui") {
		creer_fenetre(100,50,500,500,'Accueil PWAR','bin/home.html');
	} else {
		document.getElementById("racc1").style.top=getCookie(username + "raccuntop");
		document.getElementById("racc1").style.left=getCookie(username + "raccunleft");
		document.getElementById("racc2").style.top=getCookie(username + "raccdeuxtop");
		document.getElementById("racc2").style.left=getCookie(username + "raccdeuxleft");
		if(getCookie(username + "background")) {
			document.getElementById("desktop").style.backgroundImage=getCookie(username + "background");
		}
	}
}
function background(url) {
document.getElementById("desktop").style.backgroundImage="url(" + url + ")";
}
