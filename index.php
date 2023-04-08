<?php
    include('src/backend/router.php');
    
    $path = parse_url($_SERVER['REQUEST_URI'])['path'];
    $method = $_SERVER['REQUEST_METHOD'];
    $router = new Router();

    if($method == 'POST')
    {
        $inputs = $_POST;
        $router->RoutPost($path, $inputs);
    }
    else
    {
        $router->RoutGet($path);
    }