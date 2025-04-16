<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/router/web.php';


routing($routes);

// if($path === '/') {
//     $file = 'view/home.php';
// }elseif($path === '/about-us') {
//     $file = 'view/about.php';
// }elseif($path === '/services') {
//     $file = 'view/services.php';
// }else {
//     $file = 'view/not-found.php';
// };


// require_once $routes[$path] ?? 'view/not-found.php';

// view($routes[$path] ?? 'not-found');

// echo $routes[$path] ?? 'not-found'; 



