<?php

$showSuccess = false; // Flag to check if we should show the popup

if (isset($_POST['submit'])) {

    $cin = $_POST["cin"];
    $firstName = $_POST["firstName"];
    $secondName = $_POST["lastName"];
    $dateBorn = $_POST["dateBorn"];
    $adress = $_POST["adress"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $session = $_POST["session"];
    $type = $_POST["typeOfFormation"];

    $sql = "INSERT INTO etudiant (numCINEtu, nomEtu,prenomEtu ,dateNaissance,adressEtu,villeEtu,niveauEtu,emailEtu,motPasseEtu) VALUES (:cin,:nom,:prenom,:dateN,:adresse,:ville,:niveau,:email,:motPasse)";

    $requete = $pdo->prepare($sql);

    $requete->execute([
        ':cin' => $cin,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':dateN' => $dateNaissance,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':niveau' => $niveau,
        ':email' => $email,
        ':motPasse' => password_hash($motPasse, PASSWORD_DEFAULT)
    ]);

    $sql2 = "INSERT INTO inscription (codeSess, numCINEtu, typeCours) VALUES (:codeSess,:cin,:typeCours)";


    $requete2 = $pdo->prepare($sql2);

    $requete2->execute([
        ':codeSess' => $codeSess,
        ':cin' => $cin,
        ':typeCours' => $typeCours
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
    .modal-custom {
        display: none;
        position: fixed;
        z-index: 1050;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .modal-content-custom {
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 650px;
        padding: 30px;
        position: relative;
        animation: slideDown 0.4s ease-out forwards;
        opacity: 0;
        transform: translateY(-50px);
    }

    @keyframes slideDown {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .close-btn-custom {
        position: absolute;
        right: 24px;
        top: 20px;
        font-size: 28px;
        font-weight: bold;
        color: #aaa;
        cursor: pointer;
        transition: color 0.2s ease;
        line-height: 1;
    }

    .close-btn-custom:hover {
        color: #333;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
        padding: 12px 16px;
        border: 1px solid #ced4da;
        transition: all 0.2s ease-in-out;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.15);
    }

    .btn-submit {
        padding: 12px;
        font-weight: 600;
        border-radius: 8px;
        transition: transform 0.1s ease, background-color 0.2s ease;
    }

    .btn-submit:active {
        transform: scale(0.98);
    }

    .success-overlay-custom {
        display: flex;
        position: fixed;
        z-index: 1100;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .success-box-custom {
        background: #fff;
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        animation: popIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        opacity: 0;
        transform: scale(0.7);
    }

    @keyframes popIn {
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .success-icon-custom {
        width: 80px;
        height: 80px;
        background: #28a745;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        margin: 0 auto 24px;
        animation: scaleCheck 0.5s ease-in-out 0.3s both;
    }

    @keyframes scaleCheck {
        0% {
            transform: scale(0);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }
</style>



<div id="registerModal" class="modal-custom">
    <div class="modal-content-custom">
        <span class="close-btn-custom" onclick="closeModal('registerModal')">&times;</span>
        <h2 class="mb-4 fw-bold text-dark text-center">Inscription</h2>

        <form action="" method="post" class="auth-form">
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <input type="text" class="form-control" placeholder="n°: CIN" name="cin" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Nom" name="nom" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Prénom" name="prenom" required>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted small">Date de naissance</span>
                        <input type="date" class="form-control" name="dateNaissance" required>
                    </div>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" placeholder="Adresse" name="adresse" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Ville" name="ville" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Niveau d'études" name="niveau" required>
                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control" placeholder="Email (ex: nom@gmail.com)" name="email"
                        required>
                </div>
                <div class="col-md-6">
                    <input type="password" class="form-control" placeholder="Mot de passe" name="motPasse" required>
                </div>
                <div class="col-md-6">
                    <select name="codeSess" class="form-select" required>
                        <option value="" disabled selected>Choisir une session</option>
                        <option value="1">Session 1</option>
                        <option value="2">Session 2</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select name="typeCours" class="form-select" required>
                        <option value="" disabled selected>Type de cours</option>
                        <option value="Presentiel">Présentiel</option>
                        <option value="Distance">À distance</option>
                    </select>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100 btn-submit mb-3 shadow-sm">Valider
                l'inscription</button>
        </form>

        <p class="text-center text-muted mb-0">
            Déjà inscrit ? <a href="#" class="text-decoration-none fw-semibold"
                onclick="switchModal('registerModal', 'loginModal'); return false;">Se connecter</a>
        </p>
    </div>
</div>

<div class="success-overlay-custom" id="successPopup" style="display: none;">
    <div class="success-box-custom">
        <div class="success-icon-custom">✓</div>
        <h3 class="mb-2 fw-bold text-dark">Inscription Réussie !</h3>
        <p class="text-muted mb-4">L'étudiant a été enregistré avec succès.</p>
        <button class="btn btn-success w-100 py-2.5 rounded-3 fw-semibold"
            onclick="redirectToIndex()">Continuer</button>
    </div>
</div>


<script>
    function redirectToIndex() {
        window.location.href = "./index.php";
    }

    <?php if ($showSuccess): ?>

        const registerModal = document.getElementById('registerModal');
        if (registerModal) { registerModal.style.display = 'none'; }


        document.getElementById('successPopup').classList.add('show');

        setTimeout(() => {
            redirectToIndex();
        }, 4000);
    <?php endif; ?>
</script>