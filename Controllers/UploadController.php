<?php

require_once 'AppController.php';

class UploadController extends AppController {

    public function upload() {

        if (isset($_SESSION['id'])) {

            $gameType = $_POST['fav-type'];
            $description = $_POST['description'];
            $photo = "";

            $uploadAvailable = false;
            $array = explode('.', $_FILES['photo']['name']);
            $fileExt = strtolower(end($array));
            $targetDir = "Public/img/uploads/";

            if ($_FILES['photo']['name'] != "") {

                $uploadAvailable = true;

                $extensions = array("jpeg", "jpg", "png");

                if (!in_array($fileExt, $extensions)) {
                    $_SESSION['fileError'] = 'Złe rozszerzenie pliku. Wybierz plik z rozszerzeniem PNG lub JPEG';
                    $uploadAvailable = false;

                    if ($_FILES['photo']['size'] == 0) {        // upload_max_size returns 0 if the size of file is bigger than 2M
                        $_SESSION['fileError'] = 'Plik zbyt duży. Maksymalna wielkość pliku to 2MB';
                        $uploadAvailable = false;
                    }
                }
            }

            if ($uploadAvailable) {
                $photo = md5($_SESSION['id']);
                $targetFile = $targetDir.$photo;

                if(!move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                    print "Błąd z wrzuceniem zdjęcia. Za utrudnienia przepraszamy";
                    die();
                }
            }

            $userRepository = new UserRepository();
            if ($userRepository->isPhotoSet($_SESSION['id'])) {
                $photo = md5($_SESSION['id']);
            }

            $userRepository->addUserDetails($gameType, $description, $photo);

            $url = "http://$_SERVER[HTTP_HOST]/PAI/";
            header("Location: {$url}?page=profile");
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/PAI/";
            header("Location: {$url}?page=login");
        }
    }
}
