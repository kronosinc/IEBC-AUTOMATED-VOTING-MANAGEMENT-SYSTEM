<?php
$page1 = $_GET['page'];
$id = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM agent WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  ?>
  <script>
window.alert("Agent record deleted successfully");
window.location="view_agent.php?page=<?php $page ?>";
</script>
<?php
} else {
    header("location:view_agent.php?page=$page");
}

$conn->close();

?>
