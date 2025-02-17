<?php 
// echo "<pre>";

// print_r($_POST);
// print_r($_FILES);


$saveFolder = "product-photos";
$productFolder = "products";

if (!is_dir($saveFolder)) {
    mkdir($saveFolder);
};
if (!is_dir($productFolder)) {
    mkdir($productFolder);
};

$ext = pathinfo($_FILES['product_image']['name'])["extension"];
$saveFileName = $saveFolder . "/" . uniqid() . "." . $ext;

if(move_uploaded_file($_FILES['product_image']['tmp_name'], $saveFileName)){
    $_POST['product_image'] = $saveFileName;
};

$json = json_encode($_POST);
echo $json;

$productFileName = $productFolder . "/" . uniqid() . "_" . $_POST['product_name'] . ".json";

touch($productFileName);

file_put_contents($productFileName, $json);

header("Location: product.php");