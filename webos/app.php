<?php

header("Content-Type: text/plain");

$url = (isset($_GET["app"])) ? $_GET["app"] : NULL;

if ($url) {
        if (preg_match("#^https?://#i", $_GET['app'])) {
            echo '<iframe src="' . $_GET['app'] . '" class="fendist"/>';
        } else {
            //@include $_GET['app'];
            if(!@include $_GET["app"]){
                echo "Ce programme rencontre un probleme ou n'est pas disponible";
            }
        }
    } else {
        echo "Ce programme rencontre un probleme ou n'est pas disponible";
}
?>

