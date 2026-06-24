<?php
require '../config/db.php';

$table = $_GET['table'];
$id = $_GET['id'];

if ($table == 'formation') {
    $stmt = $pdo->prepare("DELETE FROM formation WHERE idForm = ?");
    $stmt->execute([$id]);
} elseif ($table == 'etudiant') {
    // Delete inscriptions first
    $stmt1 = $pdo->prepare("DELETE FROM inscription WHERE numCINEtu = ?");
    $stmt1->execute([$id]);

    // Then delete student
    $stmt2 = $pdo->prepare("DELETE FROM etudiant WHERE numCINEtu = ?");
    $stmt2->execute([$id]);
} elseif ($table == 'session') {
    $stmt = $pdo->prepare("DELETE FROM session WHERE idSess = ?");
    $stmt->execute([$id]);
} elseif ($table == 'specialite') {
    $stmt = $pdo->prepare("DELETE FROM specialite WHERE idSpec = ?");
    $stmt->execute([$id]);
}

// Redirect back with a success message flag in the URL
echo ("success");
exit;
