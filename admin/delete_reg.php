<?php
$page1 = $_GET['page'];
$id = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM registrar WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  ?>
  <script>
window.alert("Registrar record deleted successfully");
window.location="view_reg.php?page=<?php $page ?>";
</script>
<?php
} else {
    header("location:view_reg.php?page=$page");
}

$conn->close();

?>
