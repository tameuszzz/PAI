<?php

require_once 'AppController.php';
require_once __DIR__ . '//..//Models//User.php';
require_once __DIR__ . '//..//Repository//UserRepository.php';

class SecurityController extends AppController {

    public function login() {

        $userRepository = new UserRepository();

        if ($this->isPost()) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($userRepository->isUserRegistered($email, $password)) {

                $_SESSION['id'] = $email;
                $url = "http://$_SERVER[HTTP_HOST]/PAI";
                header("Location: {$url}?page=home");

            } else {
                $this->renderPage('login', ['messages' => 'Podany email lub hasło są nieprawidłowe!']);
            }
        } else if (isset($_SESSION['id'])) {
            $url = "http://$_SERVER[HTTP_HOST]/PAI";
            header("Location: {$url}?page=home");
        } else if (isset($_SESSION['registration'])) {
            $message = $_SESSION['registration'];
            $_SESSION['registration'] = null;
            $this->renderPage('login', $message);
        } else {
            $this->renderPage('login');
        }
    }

    public function register() {
        if ($this->isPost()) {

            $name = $_POST['name'];
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];
            $repeatPassword = $_POST['repeatPassword'];
            $gender = $_POST['gender'];
            $age = $_POST['birthday'];
            $gameType = $_POST['fav-type'];

            $today = new DateTime(date("Y-m-d"));
            $bday = new DateTime($age);
            $interval = $today->diff($bday);

            if (empty($name) || empty($password) || empty($repeatPassword) || empty($gender) || empty($age) || empty($gameType))
            {
                $this->renderPage('registration', ['messages' => 'Musisz wypelnic wszystkie pola!']);
            }
            else if (empty($email)) {
                $this->renderPage('registration', ['messages' => 'Podany email jest niepoprawny!']);
            } else {
                $userRepository = new UserRepository();
                if (!$userRepository->isEmailAvailable($email)) {
                    $this->renderPage('registration', ['messages' => 'Ten email jest już zajęty!']);
                } else if (strlen($password) < 7) {
                    $this->renderPage('registration', ['messages' => 'Hasło musi mieć conajmniej 7 znaków!']);
                } else if ($password != $repeatPassword) {
                    $this->renderPage('registration', ['messages' => 'Hasła muszą być takie same!']);
                } else if (intval($interval->y) < 13) {
                    $this->renderPage('registration', ['messages' => 'Musisz mieć ukończone 13 lat!']);
                } else {
                    $userRepository->addUser($email, md5($password), $name, $gender, $age, $gameType);
                    $_SESSION['registration'] = ['messages' => 'Accountant has been created.', 'color' => '#F28627'];
                    $url = "http://$_SERVER[HTTP_HOST]/PAI/";
                    header("Location: {$url}?page=login");
                }
            }
        } else {
            $this->renderPage('registration');
        }
    }
    public function logout() {
        session_destroy();
        $_SESSION['id'] = null;
        $this->renderPage('login', ['messages' => 'You have been logged out!', 'color' => '#F28627']);
    }
}
