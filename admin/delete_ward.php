<?php
$page1 = $_GET['page'];
$Sno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM ward WHERE Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
  ?>
  <script>
window.alert("WARD used elsewhere!! NOT DELETED");
window.location="view_wards.php?page=<?php $page ?>";
</script>
<?php
} else {
    header("location:view_wards.php?page=$page");
}

$conn->close();

?>
