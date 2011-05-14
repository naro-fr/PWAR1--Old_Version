<?php
    copy("http://naro-fr.tk/pwar/install.zip","./install.zip");
    $zip = new ZipArchive;
    $zip->open('install.zip');
    $zip->extractTo('./');
    $zip->close();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" style="height:100%;">
   <head>
       <script type="text/javascript">
function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function refresh() {
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                	document.getElementById("status").innerHTML=xhr.responseText;
		}
	};
	xhr.open("GET", "statusfile.html", true);
	xhr.send(null);
}

function password() {
document.getElementById("iframe").src="password.php?pass=" + document.getElementById("pass").value;
document.getElementById("passwd").innerHTML = "Installation en cours...";
}
       </script>
       <title>Installation de PWAR</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body style="background:#e3e3e3;font-family:Arial,Sans,Verdana,Serif;height:100%;overflow:hidden;">
    <div style="width:100%;height:100%;/*overflow:scroll*/;position:absolute;">
     <h2>Bienvenue dans l'assistant d'installation de PWAR</h2>
     <div id="passwd">
     Pour commencer, renseignez un mot de passe pour l'administrateur :
     <form onsubmit="password();return false;">
       <input type="password" name="pass" id="pass"/>
     </form>
     </div>
     <div id="status"></div>
    </div>
    <iframe id="iframe" style="position:absolute;top:100%;"></iframe>
    <iframe src="download.php" id="download" style="position:absolute;top:100%;left:50%;"></iframe>
    <script type="text/javascript">
setInterval("refresh()", 500);
    </script>
   </body>
</html>
