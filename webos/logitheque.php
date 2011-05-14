<?php
session_start();
if($_SESSION['username']) {
unlink('statusfile.html');
if (isset($_GET['app'])) {
  $status=fopen('statusfile.html','a+');
  fwrite($status,"Téléchargement du fichier...");
  $file=$_GET['app'];
  $url=$_GET['url'];
  $name=$_GET['name'];
  $apps=fopen('usr/bin/apps.html','a+');
  if (!copy($file, './current.zip')) {
      fwrite($status,"Échec");
  } else {
    chmod('current.zip',0777);
    $zip = new ZipArchive;
    fwrite($status,"Fait<br />Décompression de l'archive...");
    if ($zip->open('current.zip') === TRUE) {
        $zip->extractTo('./');
        $zip->close();
        fwrite($status,'Fait<br />');
        unlink('current.zip');
        fwrite($status,"Application des changements...");
        fwrite($apps,"\n<a href=\"#\" onclick=\"creer_fenetre(100,100,500,400,'" . $name . "','" . $url . "')\">" . $name . "</a><br />");
        fwrite($status,"Fait<br />Installation de " . $name . " terminée avec succès");
    } else {
        fwrite($status,'une erreur s\'est produite : fichier introuvable');
    }
  }
  fclose($status);
  fclose($apps);
}
elseif(isset($_GET['uninstall']))
{
  $status=fopen('statusfile.html','a+');
  fwrite($status,"Application des changements...");
  $name=$_GET['uninstall'];
  $apps=file('usr/bin/apps.html', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  $files=file('etc/logitheque/' . $name . 'info.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  $nombre=0;
  while($nombre!=count($files)) {
    unlink($files[$nombre]);
    $nombre++;
  }
  $nombre=0;
  while($nombre!=count($apps)) {
    if(preg_match("/" . $name . "/i", $apps[$nombre])) {
      $apps[$nombre]=null;
    } else {
      $apps[$nombre]=$apps[$nombre] . "\n";
    }
    $nombre++;
  }
  $app=fopen('usr/bin/apps.html', 'w+');
  unlink('etc/logitheque/' . $name . 'info.txt');
  $nombre=0;
  while($nombre!=count($apps)) {
    if($apps[$nombre]) {
      fwrite($app, $apps[$nombre]);
    }
    $nombre++;
  }
  fclose($app);
  fwrite($status,"Fait<br />Désinstallation de " . $name . " terminée");
  fclose($status);
} elseif(isset($_GET['update'])) {
  $status=fopen('statusfile.html','a+');
  $file=$_GET['update'];
  $name=$_GET['name'];
  fwrite($status,"Fait<br />Téléchargement du fichier...");
  if (!copy($file, './current.zip')) {
      fwrite($status,"Échec");
  } else {
    chmod('current.zip',0777);
    $zip = new ZipArchive;
    fwrite($status,"Fait<br />Décompression de l'archive...");
    if ($zip->open('./current.zip') === TRUE) {
        $zip->extractTo('./');
        $zip->close();
        unlink('./current.zip');
        fwrite($status,'Fait<br />Mise à jour de ' . $name . ' terminée');
    } else {
      fwrite($status,"Échec");
    }
  }
  fclose($status);
}
} else {
echo "Vous n'êtes pas autorsisé à installer, mettre à jour ou désinstaller des applications sur ce serveur.";
}
?>
