<?php
$page1 = $_GET['page'];
$Sno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM county WHERE Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
  ?>
  <script>
window.alert("COUNTY record deleted successfully");
window.location="view_counties.php?page=<?php $page ?>";
</script>
<?php
} else {
    header("location:view_counties.php?page=$page");
}

$conn->close();

?>
