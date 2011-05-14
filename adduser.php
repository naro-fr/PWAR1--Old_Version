<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username']=="root") {
  if(isset($_POST['username']) && isset($_POST['pass'])) {
    chmod('etc/passwd', 0600);
    $passwd=fopen("etc/passwd", "a+");
    fwrite($passwd, $_POST['username'] . "\n" . md5($_POST['pass']) . "\n");
    fclose($passwd);
    chmod('etc/passwd', 0000);
  }
  header("Location: logi.php");
} else {
  header("Location: admin.php");
}
?>
