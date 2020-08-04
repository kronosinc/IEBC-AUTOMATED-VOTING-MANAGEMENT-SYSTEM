<?php
$page1 = $_GET['page'];
$Sno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM polling WHERE Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
  ?>
  <script>
window.alert("POLLING used elsewhere!! NOT DELETED");
window.location="view_pollings.php?page=<?php $page ?>";
</script>
<?php
} else {
    header("location:view_pollings.php?page=$page");
}

$conn->close();

?>
