<?php

require_once '../config/db.php';

$name = "Alami";

$sql = "SELECT * FROM etudiant WHERE nomEtu = :nom";

$requete = $pdo->prepare($sql);

$requete->execute([
    "nom" => $name
]);

$etudiants = $requete->fetchAll(PDO::FETCH_ASSOC);

foreach($etudiants as $etudiant) {
    echo "CIN: " . $etudiant["numCINEtu"] ."<br>";
    echo "Nom: " . $etudiant["nomEtu"] ."<br>";
    echo "prenom: " . $etudiant["prenomEtu"] . "<br>";
    echo "ville: " . $etudiant["villeEtu"] . "<br>";
};
