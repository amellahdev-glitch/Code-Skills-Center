<?php

$showSuccess = false; // Flag to check if we should show the popup

if (isset($_POST['submit'])) {

    $cin = $_POST["cin"];
    $firstName = $_POST["firstName"];
    $secondName = $_POST["lastName"];
    $dateBorn = $_POST["dateBorn"];
    $adress = $_POST["adress"];
    $city = $_POST["city"];
    $lvl = $_POST["lvl"];

    $stmt = $pdo->prepare("INSERT INTO etudiant(numCINEtu, nomEtu, prenomEtu, dateNaissance, adressEtu, villeEtu, niveauEtu) 
                           VALUES (:cin, :firstName, :lastName, :dateBorn, :adress, :city, :lvl)");

    $result = $stmt->execute([
        ':cin' => $cin,
        ':firstName' => $firstName,
        ':lastName' => $secondName,
        ':dateBorn' => $dateBorn,
        ':adress' => $adress,
        ':city' => $city,
        ':lvl' => $lvl
    ]);

    if ($result) {
        // Instead of redirecting instantly, we set this to true
        $showSuccess = true;
    } else {
        die("Erreur lors de l'inscription.");
    }
}
?>

<style>
    /* Success Popup Backdrop Overlay */
    .success-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10000;
        /* Makes sure it sits on top of your register modal */
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    /* Active state to display the overlay */
    .success-overlay.show {
        opacity: 1;
        pointer-events: auto;
    }

    /* Success Popup Box */
    .success-box {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        text-align: center;
        max-width: 400px;
        width: 90%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        transform: scale(0.8);
        transition: transform 0.3s ease;
    }

    .success-overlay.show .success-box {
        transform: scale(1);
    }

    /* Checkmark circle */
    .success-icon {
        width: 60px;
        height: 60px;
        background: #e6f7ed;
        color: #28a745;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin: 0 auto 15px auto;
    }

    .success-box h3 {
        margin: 0 0 10px 0;
        color: #333;
    }

    .success-box p {
        color: #666;
        font-size: 14px;
        margin-bottom: 20px;
    }

    /* Success Button */
    .success-btn {
        background: #28a745;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        font-size: 15px;
    }

    .success-btn:hover {
        background: #218838;
    }
</style>


<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('registerModal')">&times;</span>
        <h2>Inscription</h2>
        <form action="" method="post" class="auth-form">
            <input type="text" placeholder="n°: CIN " name="cin" required>
            <input type="text" placeholder="Nom" name="firstName" required>
            <input type="text" placeholder="Prenom" name="lastName" required>
            <input type="date" name="dateBorn" required>
            <input type="text" name="adress" placeholder="Adresse" required>
            <input type="text" placeholder="Ville" name="city" required>
            <input type="text" placeholder="niveau..." name="lvl" required>

            <button type="submit" name="submit" class="btn btn-primary w-100">Valider</button>
        </form>
        <p class="auth-switch">Déjà inscrit ? <a href="#"
                onclick="switchModal('registerModal', 'loginModal'); return false;">Se connecter</a></p>
    </div>
</div>


<div class="success-overlay" id="successPopup">
    <div class="success-box">
        <div class="success-icon">✓</div>
        <h3>Inscription Réussie !</h3>
        <p>L'étudiant a été enregistré avec succès.</p>
        <button class="success-btn" onclick="redirectToIndex()">Continuer</button>
    </div>
</div>


<script>
    // Redirect function triggered when clicking "Continuer"
    function redirectToIndex() {
        window.location.href = "./index.php";
    }

    // PHP will echo this block only if $showSuccess evaluates to true
    <?php if ($showSuccess): ?>
        // Hide your registration modal first if open
        const registerModal = document.getElementById('registerModal');
        if (registerModal) { registerModal.style.display = 'none'; }

        // Trigger and show our beautifully formatted success popup
        document.getElementById('successPopup').classList.add('show');

        // Optional auto-redirect after 4 seconds if they don't click the button
        setTimeout(() => {
            redirectToIndex();
        }, 4000);
    <?php endif; ?>
</script>