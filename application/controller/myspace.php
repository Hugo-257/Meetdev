<?php
session_start();

class Myspace
{
    public function index()
    {
        // load views

        if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["user"])) {
            header('Location: ' . URL . 'auth');
        } else {
            $user = Helper::decrypt($_SESSION["user"]);
            $avatarName = strtoupper(substr($user["nom"], 0, 1)) . strtoupper(substr($user["prenom"], 0, 1));
            $events = Favorite::getFavoritesUser($user["id"]);
            require APP . 'view/_templates/header_auth.php';
            require APP . 'view/myspace/index.php';
            require APP . 'view/_templates/footer.php';

        }
    }



    public function createEvent()
    {
        if (isset($_POST["addEvent"])) {
            $status = 'error';
            if (!empty($_FILES["image"]["name"])) {

                // Get file info 
                $fileName = basename($_FILES["image"]["name"]);
                $targetDir = 'uploads/';
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {

                    // Valid image extension
                    $valid_extension = array("png", "jpeg", "jpg");

                    if (in_array($fileType, $valid_extension)) {
                        // Upload file
                        if (
                            move_uploaded_file(
                                $_FILES["image"]["tmp_name"],
                                $targetFilePath
                            )
                        ) {
                            // Execute query
                            $event = new Event($_POST["nom"], $_POST["place"], $_POST["description"], $fileName, Helper::formateDate($_POST["date"]), Helper::formatTime($_POST["debut"]), Helper::formatTime($_POST["fin"]));
                            if ($event->addEvent()) {
                                $status = 'success';
                                $statusMsg = "File uploaded successfully.";
                            } else {
                                $statusMsg = "File upload failed, please try again.";
                            }
                        }
                    }
                } else {
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                }
            } else {
                $statusMsg = 'Please select an image file to upload.';
            }
        }
    }


    public function save()
    {
        if (isset($_GET["id"])) {
            if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["user"])) {
                header('Location: ' . URL . 'auth');
            } else {
                $user = Helper::decrypt($_SESSION["user"]);
                
                $favorite=new Favorite($user["id"],$_GET["id"]);
                $res=$favorite->addFavoritesUser();
                if($res){
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function remove()
    {
        if (isset($_GET["id"])) {
            if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["user"])) {
                header('Location: ' . URL . 'auth');
            } else {
                $user = Helper::decrypt($_SESSION["user"]);
                $res=Favorite::removeFavoritesUser($user["id"],$_GET["id"]);
                if($res){
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

}