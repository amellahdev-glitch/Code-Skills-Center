<?php




$adminEmail = "amellah.dev@gmail.com";
$adminPassword = "amellah";

if(isset($_POST["logIn"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if($email == $adminEmail && $adminPassword == $password) {

        header('Location: ./admin.php');
        exit();

    } else {
        echo "Wrong information";
    }
}

?>


 <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('loginModal')">&times;</span>
            <h2>Connexion</h2>
            <form class="auth-form" autocomplete="on" action="../admin/logIn.php" novalidate method="POST">
                <input type="email" placeholder="Adresse Email" name="email" required>
                <input type="password" placeholder="Mot de passe" name="password" required>
                <button type="submit" name="logIn" value="1" class="btn btn-primary w-100">Se connecter</button>
            </form>
            <p class="auth-switch">Nouveau ici ? <a href="#" onclick="switchModal('loginModal', 'registerModal')">Créer un compte</a></p>
        </div>
    </div>