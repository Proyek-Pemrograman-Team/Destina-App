<?php
include 'config.php';

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM wisata WHERE id = $id");
$data = mysqli_fetch_assoc($query);
echo json_encode($data);
?>
