<?php
    include_once('src/backend/Manager.php');
    include_once('src/backend/CheckerDisc.php');
    include_once('src/backend/CheckerFurn.php');
    include_once('src/backend/CheckerBook.php');
    include_once('src/backend/Query.php');
    include_once('src/backend/Product.php');
    include_once('src/backend/Check.php');
    include_once('src/backend/Disc.php');
    include_once('src/backend/Book.php');
    include_once('src/backend/Furniture.php');
    include_once('src/backend/Database.php');
    class Router
    {
        public function RoutPost($uri, $inputs)
        {
            $routes = [
                '/' => 'src/frontend/index.html',
                '/add-product' => 'src/frontend/templates/add.html',
                '/add-book' => 'src/frontend/templates/add.html',
                '/add-disc' => 'src/frontend/templates/add.html',
                '/add-furn' => 'src/frontend/templates/add.html'
            ];
            $functionspost = [
                '/display' => 'Manager::display',
                '/massDelete' => 'Manager::massDel',
                '/add-book' => 'Manager::addBook',
                '/add-disc' => 'Manager::addDisc',
                '/add-furn' => 'Manager::addFurn'
            ];
            if(array_key_exists($uri, $functionspost))
            {
                call_user_func($functionspost[$uri], $inputs);
            }
            else
            {
                include($routes['/']);
            }

        }
        public function RoutGet($uri)
        {
            $routes = [
                '/' => 'src/frontend/index.html',
                '/add-product' => 'src/frontend/templates/add.html',
                '/add-book' => 'src/frontend/templates/add.html',
                '/add-disc' => 'src/frontend/templates/add.html',
                '/add-furn' => 'src/frontend/templates/add.html'
            ];
            $functionspost = [
                '/add-book' => 'Manager::addBook',
                '/add-disc' => 'Manager::addDisc',
                '/add-furn' => 'Manager::addFurn'
            ];
            if(array_key_exists($uri, $routes))
            {
                include($routes[$uri]);   
            }
            else
            {
                include($routes['/']);

            }

        }
    }