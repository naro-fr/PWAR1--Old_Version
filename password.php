<?php
$passwd=fopen("etc/passwd", "w+");
fwrite($passwd, "root\n" . md5($_GET['pass']) . "\n");
fclose($passwd);
?>
