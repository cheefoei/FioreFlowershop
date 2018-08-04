<?php

require_once '../controller/CatListMapper.php';
$catlistmap = new CatListMapper();

$id = intval($_GET['id']);
$catlistmap->delete($id);
echo "<p>Product deleted successfully!</p><br/>";
echo '<a href="newCatalogItem.php">new cat</a>';
echo '<script>window.location.href = "../newCatalogItem.php";</script>';
?>

