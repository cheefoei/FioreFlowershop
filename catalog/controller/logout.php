<?php
/**
 * Description of logout.php
 *If is logout commad issued, will clear session data and redirect to login page
 * @author Loo Jia Wei
 */
session_start();
if (isset($_POST['logout'])) {
    echo "Logging out";
    unset($_SESSION['staff']);
    echo '<script>window.location.href = "../../JJview/StaffLogin.php";</script>';
}
else{
    echo '<script>window.location.href = "../../JJview/StaffLogin.php";</script>';
}
?>
