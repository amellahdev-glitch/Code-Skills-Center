<?php
// 1. DATABASE CONNECTION
require '../config/db.php';

// 2. FETCH DATA USING SIMPLE, STANDARD PDO STATEMENTS
$stmt1 = $pdo->query("SELECT * FROM formation");
$courses = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $pdo->query("SELECT * FROM etudiant");
$students = $stmt2->fetchAll(PDO::FETCH_ASSOC);


$stmt3 = $pdo->query("SELECT * FROM session");
$sessions = $stmt3->fetchAll(PDO::FETCH_ASSOC);


$stmt4 = $pdo->query("SELECT * FROM specialite");
$specialites = $stmt4->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tulua Institute — Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        /* 1. Freeze the sidebar on the left screen layout */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 16.666667%;
            /* This matches col-md-2 width perfectly */
            height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #e9ecef;
            z-index: 1000;
            /* Keeps it on top of other elements */
            overflow-y: auto;
            /* If you add lots of links, the sidebar can scroll internally */
        }

        /* 2. Offset the main content so it doesn't slide under the fixed sidebar */
        main {
            margin-left: 16.666667%;
            /* Exactly the width of your sidebar */
            width: 83.333333%;
            /* Takes up the remaining screen space */
        }

        /* Small adjustment for responsiveness on tablet screens */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
            }

            main {
                margin-left: 0;
                width: 100%;
            }
        }

        .nav-custom-link {
            display: flex;
            align-items: center;
            padding: 0.8rem 1.5rem;
            color: #495057;
            text-decoration: none;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-custom-link:hover {
            background-color: #f1f3f5;
            color: #0d6efd;
        }

        /* Beautiful container boxes for your tables */
        .card-table-wrapper {
            background: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            overflow: hidden;
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <nav class="col-md-3 col-lg-2 sidebar p-3 d-flex flex-column">
                <a href="../index.php" class="d-block text-center my-4">
                    <img width="160" src="../assets/images/logo.png" alt="Tulua Institute" class="img-fluid">
                </a>

                <div class="nav flex-column gap-2 mt-3">
                    <a class="nav-custom-link" href="#formations-section">Formations</a>
                    <a class="nav-custom-link" href="#etudiants-section">Étudiants</a>
                    <a class="nav-custom-link" href="#session-section">Sessions</a>
                    <a class="nav-custom-link" href="#specialite-section">Spécialités</a>
                </div>

                <div class="mt-auto pt-4 border-top">
                    <a href="../index.php" class="btn btn-outline-secondary btn-sm w-100">← Back to Site</a>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5 py-4">

                <div id="formations-section" class="d-flex justify-content-between align-items-center mb-3 mt-2">
                    <h1 class="h3 text-dark fw-bold">Gestion des Formations</h1>
                    <button class="btn btn-primary px-4 btn-sm fw-medium">+ Ajouter une Formation</button>
                </div>

                <div class="card-table-wrapper">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Nom de la Formation</th>
                                    <th>Durée (Mois)</th>
                                    <th>Prix (MAD)</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($courses as $course) { ?>
                                    <tr>
                                        <td class="fw-semibold ps-4 text-secondary">
                                            <?php echo htmlspecialchars($course['titreForm']); ?></td>
                                        <td><?php echo htmlspecialchars($course['dureeForm']); ?> Mois</td>
                                        <td class="fw-medium text-success">
                                            <?php echo htmlspecialchars($course['prixForm']); ?> DH</td>
                                        <td class="text-end pe-4">
                                            <div class="btn-group btn-group-sm gap-3">
                                                <button class="btn btn-outline-primary">Modifier</button>
                                                <button class="btn btn-outline-danger">Supprimer</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div id="etudiants-section" class="d-flex justify-content-between align-items-center mb-3 pt-2">
                    <h1 class="h3 text-dark fw-bold">Gestion des Étudiants</h1>
                    <button class="btn btn-primary px-4 btn-sm fw-medium">+ Inscrire un Étudiant</button>
                </div>

                <div class="card-table-wrapper">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">CIN</th>
                                    <th>Nom Complet</th>
                                    <th>Ville</th>
                                    <th>Date de Naissance</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $student) { ?>
                                    <tr>
                                        <td class="fw-bold ps-4 text-dark">
                                            <?php echo htmlspecialchars($student['numCINEtu']); ?></td>
                                        <td><?php echo htmlspecialchars($student['nomEtu'] . " " . $student['prenomEtu']); ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($student['villeEtu']); ?></td>
                                        <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($student['dateNaissance']))); ?></td>
                                        <td class="text-end pe-4">
                                            <div class="btn-group btn-group-sm gap-3">
                                                <button class="btn btn-outline-primary">Modifier</button>
                                                <button class="btn btn-outline-danger">Supprimer</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>



                <div id="session-section" class="d-flex justify-content-between align-items-center mb-3 pt-2">
                    <h1 class="h3 text-dark fw-bold">Gestion des Sessions</h1>
                    <button class="btn btn-primary px-4 btn-sm fw-medium">+ Ajouter une Session</button>
                </div>

                <div class="card-table-wrapper">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Session</th>
                                    <th>Date de debut</th>
                                    <th>Date fin</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sessions as $session) { ?>
                                    <tr>
                                        <td class="fw-bold ps-4 text-dark">
                                            <?php echo htmlspecialchars($session['nomSess']); ?></td>
                                        <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($session['dateDebut']))); ?></td>
                                        <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($session['dateFin']))); ?></td>
                                        <td class="text-end pe-4">
                                            <div class="btn-group btn-group-sm gap-3">
                                                <button class="btn btn-outline-primary">Modifier</button>
                                                <button class="btn btn-outline-danger">Supprimer</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>




                <div id="specialite-section" class="d-flex justify-content-between align-items-center mb-3 pt-2">
                    <h1 class="h3 text-dark fw-bold">Gestion des Sessions</h1>
                    <button class="btn btn-primary px-4 btn-sm fw-medium">+ Ajouter une Session</button>
                </div>

                <div class="card-table-wrapper">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Specialité</th>
                                    <th>Active</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($specialites as $specialite) { ?>
                                    <tr>
                                        <td class="fw-bold ps-4 text-dark"><?php echo htmlspecialchars($specialite['descSpec']); ?></td>
                                        <td><?php echo htmlspecialchars(($specialite['Active'] == 1) ? "ouverte" : "fermer") ?></td>
                                        <td class="text-end pe-4">
                                            <div class="btn-group btn-group-sm gap-3">
                                                <button class="btn btn-outline-primary">Modifier</button>
                                                <button class="btn btn-outline-danger">Supprimer</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>