<?php
$page1 = $_GET['page'];
$id = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM presiding WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  ?>
  <script>
window.alert("Presiding record deleted successfully");
window.location="view_presd.php?page=<?php $page ?>";
</script>
<?php
} else {
    header("location:view_presd.php?page=$page");
}

$conn->close();

?>
