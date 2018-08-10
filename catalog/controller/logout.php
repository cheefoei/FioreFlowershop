<?php

if (isset($_POST['logout'])) {

    echo "Logging out";
    unset($_SESSION['staff']);
    echo '<script>window.location.href = "../../JJview/StaffLogin.php";</script>';
}
else{
    echo '<script>window.location.href = "../../JJview/StaffLogin.php";</script>';
}
?>
