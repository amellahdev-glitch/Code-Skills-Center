<?php
require '../config/db.php';


$stmt = $pdo->query("SELECT * from formation;");

$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);



$stmt = $pdo->query("SELECT * from etudiant;");

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Admin dashbord</title>
    <style>
        #dashbord {
            min-height: 100vh !important;
        }

        nav {
            border-right: 2px solid #0D6EFD;
        }
    </style>
</head>

<body>

    <main id="dashbord" class="d-flex w-100">

        <!-- navbar section -->

        <nav class="h-auto w-25 d-flex justify-content-start flex-column">
            <a href="../index.php" class="mx-auto mb-5 my-3">
                <img width="200" class="" src="../assets/images/logo.png" alt="">
            </a>
            <ul class="nav flex-column gap-3 align-items-center mt-5 w-100">
                <li class="nav-itme w-100 d-flex py-3 justify-content-center bg-primary-subtle"><a
                        class="nav-link fs-3 fw-bold text-dark" href="">Formation</a></li>
                <li class="nav-itme w-100 py-3 d-flex justify-content-center bg-primary-subtle"><a
                        class="nav-link fs-3 fw-bold text-dark" href="">Etudiant</a></li>
                <li class="nav-itme w-100 py-3 d-flex justify-content-center bg-primary-subtle"><a
                        class="nav-link fs-3 fw-bold text-dark" href="">Session</a></li>
                <li class="nav-itme w-100 py-3  d-flex justify-content-center bg-primary-subtle"><a
                        class="nav-link fs-3 fw-bold text-dark" href="">Specialité</a></li>
            </ul>
        </nav>

        <!-- the date fetch section -->

        <div class="d-flex flex-column w-100">

            <section class="w-100">
                <div class="content">
                    <h1 class="p-3">les formations</h1>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="table-danger table-active">
                                <th scope="col">Formation</th>
                                <th scope="col">Durée</th>
                                <th scope="col">Prix</th>
                                <th scope="col" class="w-25">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $course): ?>
                                <tr>
                                    <td><?php echo $course['titreForm']; ?></td>
                                    <td><?php echo $course['dureeForm']; ?></td>
                                    <td><?php echo $course['prixForm']; ?></td>
                                    <td class="d-flex gap-2">
                                        <button class="btn btn-primary">Modifier</button>
                                        <button name="delete" class="btn btn-danger">Supprimer</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </section>

            <section class="w-100">
                <h1 class="p-3">Etudiant:</h1>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="table-danger table-active">
                            <th scope="col">N°: CIN</th>
                            <th scope="col">Nom complet</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col" class="w-25">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?php echo $student['numCINEtu']; ?>"</td>
                                <td><?php echo $student['nomEtu'] . " " . $student['prenomEtu']; ?></td>
                                <td><?php echo $student['dateNaissance']; ?></td>
                                <td><?php echo $student['villeEtu']; ?></td>
                                <td class="d-flex gap-2">

                                    <?php

                                    $sql = "DELETE FROM specialite WHERE codeSpec = 105;";

                                    $nb = $pdo->exec($sql);

                                    echo $nb . " spécialité supprimée";

                                    ?>

                                    <button class="btn btn-primary">Modifier</button>
                                    <button name="delete" class="btn btn-danger">Supprimer</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </section>

        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>

<?php

// mysqli_free_result($result);


// mysqli_close($conn);
