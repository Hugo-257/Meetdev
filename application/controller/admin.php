<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

class Admin
{
    public function index()
    {
        $adminPass = ADMINPASS;
        // load views
        if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["admin"])) {
            header('Location: ' . URL . 'auth/admin');
        } else {
            $avatarName = "A";
            $events = Event::getAllEvents();
            require APP . 'view/_templates/header_auth.php';
            require APP . 'view/admin/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function authenticate()
    {
        if (isset($_POST["password"])) {
            if ($_POST["password"] == ADMINPASS) {
                $user = array("role" => "admin");
                if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                $_SESSION["admin"] = Helper::encrypt($user);
                header('location: ' . URL . 'admin');

            } else {
                $error = "Admin password is invalid!";
                require APP . 'view/_templates/header.php';
                require APP . 'view/auth/admin.php';
            }
        } else {
            $error = "";
            $adminPass = ADMINPASS;
            require APP . 'view/_templates/header.php';
            require APP . 'view/auth/admin.php';
        }
    }


    public function post()
    {   
        $action="post";
        $event=NULL;
        if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["admin"])) {
            $adminPass="";
            header('Location: ' . URL . 'auth/admin');
        } else {
            $user = Helper::decrypt($_SESSION["admin"]);
            $avatarName = 'A';
            require APP . 'view/_templates/header_auth.php';
            require APP . 'view/admin/post.php';
            require APP . 'view/_templates/footer.php';
        }
    }


    public function edit()
    {   
        $action="edit";
        $event=NULL;
        if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["admin"])) {
            $adminPass="";
            header('Location: ' . URL . 'auth/admin');
        } else {
            $user = Helper::decrypt($_SESSION["admin"]);
            $avatarName = 'A';
            if(isset($_GET["id"])){
                $event=Event::getEventById(intval($_GET["id"]));
            }
            require APP . 'view/_templates/header_auth.php';
            require APP . 'view/admin/post.php';
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
                            true
                            // move_uploaded_file(
                            //     $_FILES["image"]["tmp_name"],
                            //     $targetFilePath
                            // )
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


    public function saveUpdate()
    {   
        if (isset($_POST["updateEvent"])) {
            $status = 'error';
            if (!empty($_FILES["image"]["name"])) {

                // Retirer les inforamtions de l'image 
                $fileName = basename($_FILES["image"]["name"]);
                $targetDir = 'uploads/';
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


                $formats = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $formats)) {

                    $valid_extension = array("png", "jpeg", "jpg");

                    if (in_array($fileType, $valid_extension)) {
                        if (
                            move_uploaded_file(
                                $_FILES["image"]["tmp_name"],
                                $targetFilePath
                            )
                        ) {
                            $event = new Event($_POST["nom"] ,$_POST["place"], $_POST["description"], $fileName, Helper::formateDate($_POST["date"]), Helper::formatTime($_POST["debut"]), Helper::formatTime($_POST["fin"]));
                            $event->setId($_POST["id"]);
                            if ($event->update()) {
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

}