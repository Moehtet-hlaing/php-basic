<?php
// touch("text.txt");
// mkdir("folder");

// var_dump(is_dir("folder"));
// var_dump(is_dir("text.txt"));

// var_dump(is_file("folder"));
// var_dump(is_file("text.txt"));

// var_dump(file_exists("text.txt"));
// var_dump(file_exists("textaaa.txt"));

// print_r(scandir("."));

// unlink("text.txt");
// rmdir("folder");

// var_dump(pathinfo("test.php"));

// copy("test.php", "test2.php");
// rename("test2.php", "test3.php");

$fileName = "my.txt";

if (!file_exists($fileName)) {
   touch($fileName);
}

$fileStream = fopen($fileName, "r");

// fwrite($fileStream, "min ");
// fwrite($fileStream, "kaung ");
// fwrite($fileStream, "lar ");

// echo fread($fileStream, 500);
//  echo fgetc($fileStream);
//  echo fgetc($fileStream);
//  echo fgetc($fileStream);


//  echo fgets($fileStream);
//  echo fgets($fileStream);
// var_dump(feof($fileStream));

while (!feof($fileStream)) {
   echo fgetc($fileStream);
}

fclose($fileStream);