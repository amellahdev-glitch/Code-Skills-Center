<?php

if (isset($_POST['submit'])) {

    $cin = $_POST["cin"];
    $firstName = $_POST["firstName"];
    $secondName = $_POST["lastName"];
    $dateBorn = $_POST["dateBorn"];
    $adress = $_POST["adress"];
    $city = $_POST["city"];
    $lvl = $_POST["lvl"];

    $sql = "INSERT INTO etudiant(numCINEtu, nomEtu, prenomEtu, dateNaissance, adressEtu, villeEtu, niveauEtu) 
    VALUES ('$cin', '$firstName', '$secondName', '$dateBorn', '$adress', '$city', '$lvl')";

    

    if (mysqli_query($conn, $sql)) {

    header("Location: ../index.php");
    exit();

    } else {

    die(mysqli_error($conn));

}
    
}

?>

<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('registerModal')">&times;</span>
        <h2>Inscription</h2>
            <form action="" method="post" class="auth-form">
            <input type="text" placeholder="n°: CIN " name="cin" required>
            <input type="text" placeholder="Nom" name="firstName" required>
            <input type="text" placeholder="Prenom" name="lastName" required>
            <input type="date" name="dateBorn" required>
            <input type="adress" name="adress" placeholder="adress" required>
            <input type="text" placeholder="Ville" name="city" required>
            <input type="text" placeholder="niveau..." name="lvl" required>
                
            <button type="submit" name="submit" class="btn btn-primary w-100">Valider</button>
        </form>
        <p class="auth-switch">Déjà inscrit ? <a href="#" onclick="switchModal('registerModal', 'loginModal')">Se connecter</a></p>
    </div>
</div>