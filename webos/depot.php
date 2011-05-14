Naro<br />
<a href="#" onclick="<?php if(!file_exists("etc/logitheque/Naroinfo.txt")) {
echo "install('http://naro-fr.tk', 'Naro', 'http://naro-fr.tk/pdepot/naro.zip')\">Installer</a><br />";
} else {
echo "uninstall('http://naro-fr.tk', 'Naro')\">Désinstaller</a> | <a href=\"#\" onclick=\"update('http://naro-fr.tk/pdepot/naro.zip', 'Naro')\">Mettre à jour</a><br />";
}
?>
<hr />Pixlr<br />
<a href="#" onclick="<?php if(!file_exists("etc/logitheque/Pixlrinfo.txt")) {
echo "install('http://pixlr.com/editor', 'Pixlr', 'http://naro-fr.tk/pdepot/pixlr.zip')\">Installer</a><br />";
} else {
echo "uninstall('http://pixlr.com/editor', 'Pixlr')\">Désinstaller</a> | <a href=\"#\" onclick=\"update('http://naro-fr.tk/pdepot/pixlr.zip', 'Pixlr')\">Mettre à jour</a><br />";
}
?>
<hr />