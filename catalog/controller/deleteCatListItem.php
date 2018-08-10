<?php
/**
 * Description of delteCatListItem.php
 *The function of deleting catlist's item and redirect back to newCatalogItem.php after deletion executed.
 * @author Loo Jia Wei
 */
require_once '../controller/CatListMapper.php';
$catlistmap = new CatListMapper();

$id = intval($_GET['id']);
$catlistmap->delete($id);
echo "<p>Product deleted successfully!</p><br/>";
echo '<a href="newCatalogItem.php">new cat</a>';
echo '<script>window.location.href = "../view/newCatalogItem.php";</script>';
?>

