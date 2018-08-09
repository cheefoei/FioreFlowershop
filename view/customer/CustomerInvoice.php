
<!-- 
Name: Leong Chee Foei
 Group: G6
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Flora Flowershop - Customer Main Page</title>

        <?php
        include '../../header.php';
        require_once '../../controller/CustomerServicer.php';

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['customer'])) {
            header("Location: ../../index.php");
        }

        $CustomerServicer = new CustomerServicer();
        if (isset($_GET['logout'])) {
            $CustomerServicer->CustomerLogout();
        }
        ?>
    </head>

    <body class="container">

        <br/>
        <a href="CustomerMainPage.php">Home</a>  
        <br/>
        <h2>Customer Invoice</h2>
        <br/>
        <br/>

    </body>
</html>
