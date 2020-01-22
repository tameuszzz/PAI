<?php
require_once 'Controllers/SecurityController.php';
require_once 'Controllers/BoardController.php';
require_once 'Controllers/AdminController.php';
require_once 'Controllers/UploadController.php';

class Routing {

    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'registration' => [
                'controller' => 'SecurityController',
                'action' => 'register'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'home' => [
                'controller' => 'BoardController',
                'action' => 'loadHome'
            ],
            'profile' => [
                'controller' => 'BoardController',
                'action' => 'loadProfile'
            ],
            'upload' => [
                'controller' => 'UploadController',
                'action' => 'upload'
            ],
            'settings' => [
                'controller' => 'BoardController',
                'action' => 'loadSettings'
            ],
            'mygames' => [
                'controller' => 'BoardController',
                'action' => 'loadGames'
            ],
            'messages' => [
                'controller' => 'BoardController',
                'action' => 'loadMessages'
            ]
        ];
    }

    public function runPage() {

        $page = isset($_GET['page']) ? $_GET['page'] : 'login';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}
