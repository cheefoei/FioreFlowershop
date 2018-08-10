<!-- 
Name: Lim Jun Kit
 Group: G6
-->
<?php

require_once '../controller/connect_db.php';
require_once '../JJmodel/User.php';

class StaffLoginControl {

    private $conn;

    function __construct() {

        $db = connect_db::getDatabaseInstance();
        $this->conn = $db->getConnection();
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
                while ($row = $stmt->fetch()){
                $user->setType($row['user_type']);
                $_SESSION['staff'] = $user;
                header("Location: ../JJview/StaffMainPage.php");
                }
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
