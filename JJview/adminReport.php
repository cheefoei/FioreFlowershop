<?php

require_once '../JJmodel/User.php';
$usertype;
$type = "Admin";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['staff'])) {
    $user = $_SESSION['staff'];
    if ($user instanceof User) {
        $usertype = $user->getType();
    }
}

if (strcmp($type, $usertype) == 0) {
    echo ' <h2>Staff Main Pages</h2>';
    echo '<a href="XML1.php">Display the Delivery Report</a></br>';
    echo '<a href="createOrderReport.php">Display the Pick Up Report</a></br>';
    echo '<a href="createOrderXML.php">Display the Order Report</a></br>';
}
else{
    echo("Only admin can view the report!!!");
}
?>

