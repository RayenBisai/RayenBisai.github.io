<?php
require_once 'db_connect.php';

if (!isset($_GET['id'])) {
    die("Geen ID opgegeven.");
}

$id = $_GET['id'];

$sql = "DELETE FROM cijfers WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

header('Location: index2.php');
exit();
?>
