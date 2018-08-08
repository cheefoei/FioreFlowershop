<?php

require_once '../controller/connect_db.php';
require_once '../JJmodel/User.php';

class StaffLoginControl {

    private $conn;

    function __construct() {

        $db = new connect_db();
        $this->conn = $db->connect();
    }

    function UserLogin($user) {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        } 
        if ($user instanceof User) {

            //Check email and password from database
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE user_id = :user_id AND user_password = :user_password");
            $stmt->execute(array(':user_id' => $user->getId(), ':user_password' => $user->getPassword()));

            if ($stmt->rowCount() == 1) {
                $_SESSION['staff'] = $user;
                header("Location: ../JJview/StaffMainPage.php");
            } else {
                $_SESSION['staff_login_error'] = "Your user ID or password is not correct.";
            }
        }
    }

    function UserLogout() {

        session_start();
        if (session_destroy()) {
            header("Location: ../../index.php");
        }
    }

}

?>
