<?php
$page1 = $_GET['page'];
$Sno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM constituency WHERE Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
  ?>
  <script>
window.alert("CONSTITUENCY used elsewhere!! NOT DELETED");
window.location="view_constituencies.php?page=<?php $page ?>";
</script>
<?php
} else {
    header("location:view_constituencies.php?page=$page");
}

$conn->close();

?>
