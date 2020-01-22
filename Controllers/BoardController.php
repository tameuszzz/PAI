<?php

require_once 'AppController.php';
require_once __DIR__.'/../Database.php';
require_once __DIR__ .'//..//Models//User.php';

class BoardController extends AppController {

    public function loadHome() {
        if (isset($_SESSION['id'])) {
            $this->renderPage('home');
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/PAI/";
            header("Location: {$url}?page=login");
        }
    }

    public function loadProfile() {
        if (!$this->isPost() and isset($_SESSION['id'])) {

            $userRepository = new UserRepository();

            // if ($userRepository->isAdmin($_SESSION['id'])) {
            //     $url = "http://$_SERVER[HTTP_HOST]/PAI/";
            //     header("Location: {$url}?page=admin_panel");
            //     return;
            // }

            $user = $userRepository->getUser($_SESSION['id']);
            if (!isset($_SESSION['fileError'])) {
                $_SESSION['fileError'] = null;
            }
            $this->renderPage('profile', ['name' => $user->getName(),
                                                'gender' => $user->getGender(),
                                                'birthday' => $user->getAge(),
                                                'gameType' => $user->getGameType(),
                                                'description' => $user->getDescription(),
                                                'photo' => $user->getPhoto(),
                                                'fileError' => $_SESSION['fileError']]);
            $_SESSION['fileError'] = null;
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/PAI/";
            header("Location: {$url}?page=login");
        }
    }

    public function loadGames() {
        if (isset($_SESSION['id'])) {
            $this->renderPage('mygames');
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/PAI/";
            header("Location: {$url}?page=login");
        }
    }

    public function loadMessages() {
        if (isset($_SESSION['id'])) {
            $this->renderPage('messages');
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/PAI/";
            header("Location: {$url}?page=login");
        }
    }

    public function loadSettings() {
        if (isset($_SESSION['id'])) {
            $this->renderPage('settings');
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/PAI/";
            header("Location: {$url}?page=login");
        }
    }
}
