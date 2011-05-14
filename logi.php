<?php
session_start();
if(!$_SESSION['username']) {
header("Location: admin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" style="height:100%">
   <head>
       <title>testzip</title>
<script type="text/javascript">
function refresh() {
var logi = document.getElementById("status");
var xhr=getXMLHttpRequest();
xhr.onreadystatechange = function() {
	if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
		if(xhr.responseText!="") {
		logi.innerHTML=xhr.responseText;
		if(/termin/g.test(xhr.responseText)) {
			document.location.reload();
		}
	}
	}
};
xhr.open("GET", "statusfile.html", true);
xhr.send(null);
}
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
function install(url,nom,fichier) {
document.getElementById("logi").src = "logitheque.php?app=" + fichier + "&name=" + nom + "&url=" + url;
setInterval("refresh()",500);
document.getElementById("status").style.top=0;
document.getElementById("status").style.height="100%";
}
function uninstall(url,nom) {
document.getElementById("logi").src = "logitheque.php?uninstall=" + nom;
setInterval("refresh()",500);
document.getElementById("status").style.top=0;
document.getElementById("status").style.height="100%";
}
function update(file, nom) {
document.getElementById("logi").src = "logitheque.php?name=" + nom + "&update=" + file;
setInterval("refresh()",500);
document.getElementById("status").style.top=0;
document.getElementById("status").style.height="100%";
}
</script>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body style="height:100%;margin:0;font-family:Arial,Sans,Verdana,Serif;overflow:hidden;">
<div style="height:100%;width:100%;">
<div style="float:left;width:20%;height:100%;background:#e3e3e3;">
<h3>Logithèque<br />PWAR</h3>
Permet d'installer, désinstaller et mettre à jour de applications pour PWAR.<br />
<a href="deconnecte.php">Se déconnecter [<?php echo $_SESSION["username"]; ?>]</a><br />
<form style="display:<?php if($_SESSION['username']!='root') { echo 'none'; } else { echo 'block'; }?>;" method="post" action="adduser.php">
<input name="username" id="username" value="id"/><br />
<input name="pass" id="pass" value="pass"/><br />
<input type="submit" value="Ajouter"/>
</form>
</div>
<div style="position:absolute;left:20%;width:75%;height:100%;overflow:auto;padding:10px;">
<?php
copy('http://naro.legtux.org/pdepot','depot.php');
include 'depot.php';
?>
</div>
</div>
<div id="status" style="position:absolute;top:100%;left:0;color:white;background:black;height:0%;width:100%;overflow:auto;padding:5px;"></div>
<iframe style="width:100%;height:200px;border:0;padding:0;margin:0;" id="logi" src=""></iframe>
   </body>
</html>
