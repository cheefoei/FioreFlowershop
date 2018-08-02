<?php

require_once '../connect_db.php';
$db = new connect_db();
$conn = $db->connectPDO();

$id = intval($_GET['id']);
$query = "DELETE FROM catalog_list WHERE catlist_id=".$id;
$stmt = $conn->prepare($query);
$stmt->execute();
echo "<p>Product deleted successfully!</p><br/>";
echo '<a href="newCatalogItem.php">new cat</a>';
echo '<script>window.location.href = "../newCatalogItem.php";</script>';
?>

