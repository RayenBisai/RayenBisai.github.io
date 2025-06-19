<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id']) || !isset($_POST['cijfer'])) {
        die("Ongeldige invoer.");
    }

    $id = $_POST['id'];
    $cijfer = $_POST['cijfer'];

    $sql = "UPDATE cijfers SET cijfer = :cijfer WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cijfer' => $cijfer, 'id' => $id]);

    header('Location: index2.php');
    exit();
} else {
    die("Ongeldige aanvraagmethode.");
}
?>
