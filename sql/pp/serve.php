<?php 

echo "i am serve";

$port = 8030;
$startingPath = __DIR__."/public";
exec("php -S localhost:$port -t $startingPath");
