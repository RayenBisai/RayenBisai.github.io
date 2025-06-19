<?php
require_once 'db_connect.php';
echo "verbinding met de database is gelukt!";

$sql = "SELECT id, cijfer FROM cijfers";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Cijfers Overzicht</title>
</head>
<body>
    <h1>Overzicht van Cijfers</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cijfer</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['cijfer']); ?></td>
                <td>
                    <a href="bewerk_formulier.php?id=<?php echo urlencode($row['id']); ?>">Bewerk</a> |
                    <a href="verwijder.php?id=<?php echo urlencode($row['id']); ?>" onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">Verwijder</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
