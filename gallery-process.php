<?php 

// if (empty($_POST['upload'])) {
//     header("Location: index.php");
//     die();
// }


// echo "<pre>";
// print_r($_FILES);

$saveFolder = "photos";

if (!is_dir($saveFolder)) {
    mkdir($saveFolder);
}

// $saveFileName = $saveFolder . "/" . uniqid() . "_" . $_FILES['upload']['name'];

// $ext = pathinfo($_FILES['upload']['name'])["extension"];
// $saveFileName = $saveFolder . "/" . uniqid() . "." . $ext;

// if(move_uploaded_file($_FILES['upload']['tmp_name'], $saveFileName)){
//     header("Location: gallery.php");
// };


// multiple file upload
$error = false;

foreach($_FILES['upload']['name'] as $key => $name){
    $ext = pathinfo($name)["extension"];
$saveFileName = $saveFolder . "/" . uniqid() . "." . $ext;

if(!move_uploaded_file($_FILES['upload']['tmp_name'][$key], $saveFileName)){
   $error = true;
};

}

if ($error === false) {
    header("Location: gallery.php");
}

