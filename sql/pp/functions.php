<?php

function view(string $file, array $data=[]): void
{
    extract($data);
    require_once "view/" . $file . ".php";
};

function controller(string $fileFun): bool  // check controller
{

    $arr = explode('@', $fileFun);

    $controllerFile = $arr[0];

    $controllerFunction = $arr[1];

    require_once __DIR__ . '/controller/' . $controllerFile . '.php';

    call_user_func($controllerFunction);

    return true;
};

function routing($routes): void // routing
{
    $path = $_SERVER['PATH_INFO'] ?? '/';
    $current = $routes[$path] ?? false;
    // print_r($routes);
    if ($current) {
        controller($current);
    } else {
        view('not-found');
    };
};

function assets(string $filePath): string
{
    $fullUrl = isset($_SERVER['HTTPS'] ) ? "https" : "http"."://".$_SERVER['HTTP_HOST']."/".ltrim($filePath, '/');
    return $fullUrl;
};

function template(string $name): void   // render template 
{
    require_once __DIR__ . '/view/templates/' . $name . '.php';
};

function url(string $filePath, array $data=[]): string
{
    $fullUrl = isset($_SERVER['HTTPS'] ) ? "https" : "http"."://".$_SERVER['HTTP_HOST']."/".ltrim($filePath, '/')."?". (is_null($data) ? "" : http_build_query($data));
    return $fullUrl;
};

function connect(): object
{
    global $configs;
    return mysqli_connect($configs['db_host'], $configs['db_user'], $configs['db_pass'], $configs['db_name']);
};

function runQuery(string $sql): mixed {
    $conn = connect();
    $query = mysqli_query($conn, $sql);
    return $query;
};

function first(string $sql): mixed {
    $query = runQuery($sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
};

function get(string $sql): mixed {
    $query = runQuery($sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($query)){
        $rows[] = $row;
    };
    return $rows;
};

function dd($data) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dump Output</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-900 text-gray-200 p-6">
        <div class="max-w-5xl mx-auto">
            <div class="bg-gray-800 p-6 rounded-2xl shadow-xl overflow-x-auto">
                <pre class="whitespace-pre-wrap text-sm">';
                    print_r($data);
    echo '      </pre>
            </div>
        </div>
    </body>
    </html>';
    die();
};

function redirect(string $url) {
    header("Location: $url");
}