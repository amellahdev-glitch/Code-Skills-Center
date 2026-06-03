<?php

$adminEmail = "amellah.dev@gmail.com";
$adminPassword = "20062006";

if (isset($_POST["logIn"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email == $adminEmail && $adminPassword == $password) {

        header('Location: ./admin.php');
        exit();

    } else {
        header("Location: ../index.php");
        exit();
    }
}

?>


<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('loginModal')">&times;</span>
        <h2>Connexion</h2>
        <form id="logIn" class="auth-form" autocomplete="on" action="../admin/logIn.php" novalidate method="POST">
            <input type="email" class="mb-0" placeholder="Adresse Email" name="email" id="email" required>
            <p id="emailError" class="text-danger fw-light ps-2 fs-6"></p>
            <input type="password" class="mb-0" placeholder="Mot de passe" name="password" id="password" required>
            <p id="passwordError" class="text-danger fw-light ps-2 fs-6"></p>
            <button type="submit" name="logIn" value="1" class="btn btn-primary w-100 mt-3">Se connecter</button>
        </form>
        <p class="auth-switch">Nouveau ici ? <a href="#" onclick="switchModal('loginModal', 'registerModal')">Créer un
                compte</a></p>
    </div>
</div>


<script src="../assets/js/login.js"></script>