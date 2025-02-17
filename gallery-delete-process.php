<?php 

// echo $_GET['file_name'];

$folderName = "photos";

$file = $folderName . "/" . $_GET['file_name'];

if(unlink($file)){
    header("Location: gallery.php");
};