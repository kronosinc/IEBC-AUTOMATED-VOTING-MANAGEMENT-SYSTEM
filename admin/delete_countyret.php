<?php
$page1 = $_GET['page'];
$id = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM returnings WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  ?>
  <script>
window.alert("County-Ret record deleted successfully");
window.location="view_countyret.php?page=<?php $page ?>";
</script>
<?php
} else {
    header("location:view_countyret.php?page=$page");
}

$conn->close();

?>
