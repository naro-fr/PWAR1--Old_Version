<?php
    $status=fopen("statusfile.html", "a+");
    fwrite($status, "Téléchargement de l'archive...<br />");
    copy("http://naro-fr.tk/pwar/pwar.zip","./pwar.zip");
    fwrite($status, "Décompression...<br />");
    $zip = new ZipArchive;
    $zip->open('pwar.zip');
    $zip->extractTo('./');
    $zip->close();
    fwrite($status, "Installation terminée");
    if(file_exists("etc/passwd")) {
      fwrite($status, "<br /><a href=\"index.php#\">Accéder à PWAR</a>");
    }
    fclose($status);
?>
