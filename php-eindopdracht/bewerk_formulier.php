<?php
require_once 'db_connect.php';

if (!isset($_GET['id'])) {
    die("Geen ID opgegeven.");
}

$id = $_GET['id'];

$sql = "SELECT * FROM cijfers WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    die("Record niet gevonden.");
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bewerk Cijfer</title>
</head>
<body>
    <h1>Bewerk Cijfer</h1>
    <form action="bewerk_script.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
        <label for="cijfer">Cijfer:</label>
        <input type="text" id="cijfer" name="cijfer" value="<?= htmlspecialchars($item['cijfer']) ?>" required>
        <br><br>
        <input type="submit" value="Opslaan">
    </form>
</body>
</html>
