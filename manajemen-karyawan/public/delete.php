<?php
$id = $_GET['id'];

require_once '../config/database.php';


$sql = "DELETE FROM karyawan WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

header("Location: index.php");
?>