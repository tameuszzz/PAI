<?php
require_once 'Controllers/SecurityController.php';
require_once 'Controllers/BoardController.php';
require_once 'Controllers/AdminController.php';
require_once 'Controllers/UploadController.php';
require_once 'Controllers/GameController.php';

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
            'searchGames' => [
                'controller' => 'GameController',
                'action' => 'searchGames'
            ],
            'profile' => [
                'controller' => 'BoardController',
                'action' => 'loadProfile'
            ],
            'uploadProfile' => [
                'controller' => 'UploadController',
                'action' => 'uploadProfile'
            ],
            'uploadGame' => [
                'controller' => 'UploadController',
                'action' => 'uploadGame'
            ],
            'settings' => [
                'controller' => 'BoardController',
                'action' => 'loadSettings'
            ],
            'mygames' => [
                'controller' => 'BoardController',
                'action' => 'loadGames'
            ],
            'loadmygames' => [
                'controller' => 'GameController',
                'action' => 'loadMyGames'
            ],
            'deleteGame' => [
                'controller' => 'GameController',
                'action' => 'gameDelete'
            ],
            'messages' => [
                'controller' => 'BoardController',
                'action' => 'loadMessages'
            ],
            'adminpanel' => [
                'controller' => 'AdminController',
                'action' => 'index'
            ],
            'users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'admin_delete_user' => [
                'controller' => 'AdminController',
                'action' => 'deleteUser'
            ],
            'admin_give_admin' => [
                'controller' => 'AdminController',
                'action' => 'giveAdmin'
            ],
            'admin_deny_admin' => [
                'controller' => 'AdminController',
                'action' => 'denyAdmin'
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
