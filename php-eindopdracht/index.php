<?php 
require_once 'db_connect.php';
echo "verbinding met de database is gelukt!";

$sql = "SELECT * FROM cijfers";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


$totaal = 0;
$aantal = 0;
foreach ($results as $results) {
    $totaal += $results['cijfer'];
    $aantal++;
}

if ($aantal > 0) {
    $gemiddelde = $totaal / $aantal;
    echo "Het gemiddelde is: " . $gemiddelde;
} else {
    echo "Er zijn geen cijfers om het gemiddelde te berekenen.";
}

?>
