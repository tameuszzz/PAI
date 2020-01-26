<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class AdminController extends AppController {

    public function index(): void
    {
        if (!isset($_SESSION['id'])){
            $this->renderPage('login', ['messages' => 'Cannot take that action']);
        }

        $userRepo = new UserRepository();
        $user = $userRepo->getUser($_SESSION['id']);

        $this->renderPage('adminpanel', ['user' => $user]);
    }

    public function users() {

        $userRepo = new UserRepository();
        header('Content-type: application/json');
        http_response_code(200);

        $users = $userRepo->getUsers($_SESSION['id']);

        echo $users ? json_encode($users) : '';

    }

    public function deleteUser(): void
    {

        if (!isset($_POST['id_user'])) {
            http_response_code(404);
            return;
        }

        $user = new UserRepository();
        $user->deleteUser($_POST['id_user']);
        http_response_code(200);


    }

    public function giveAdmin(): void
    {

        if (!isset($_POST['id_user'])) {
            http_response_code(404);
            return;
        }

        $user = new UserRepository();
        $user->giveAdmin($_POST['id_user']);
        http_response_code(200);


    }

    public function denyAdmin(): void
    {

        if (!isset($_POST['id_user'])) {
            http_response_code(404);
            return;
        }

        $user = new UserRepository();
        $user->denyAdmin($_POST['id_user']);
        http_response_code(200);

    }


}
