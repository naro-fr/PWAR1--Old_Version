<?php
session_start();
chmod('etc/passwd', 0700);
$passwd=file("etc/passwd", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$nombre=0;
if(isset($_SESSION['username'])) {
  header("Location: logi.php");
}
while($nombre!=count($passwd)) {
  $username=$passwd[$nombre];
  $nombre++;
  $pass=$passwd[$nombre];
  $nombre++;
  if(isset($_POST['username']) && isset($_POST['pass'])) {
    if( $_POST['username']==$username && md5($_POST['pass'])==$pass ) {
      $_SESSION['username']=$username;
      header('Location: logi.php');
    }
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Connexion à l'administration</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body style="background:#e3e3e3;font-family:Arial,Sans,Verdana,Serif;text-align:center;">
<h2>Connexion à l'administration</h2>
<?php
if(!isset($_SESSION['username']) && isset($_POST['username'])) {
echo "Identifiant ou mot de passe incorrect";
}
chmod('etc/passwd', 0000);
?>
<form method="post" action="admin.php">
  <p>
       <label for="username">Identifiant :</label>
       <input type="text" name="username" id="username" />
       
       <br />
       <label for="pass">Mot de passe :</label>
       <input type="password" name="pass" id="pass" value="" />

       <br />
       <input type="submit" value="Connexion" />
  </p>
</form>
   </body>
</html>
