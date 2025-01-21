<?php
try {
    // Correct path to the spat.db file
$pdo = new PDO('sqlite:' . __DIR__ . '/../spat.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
