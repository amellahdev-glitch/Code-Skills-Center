<?php 

include'../includes/config.php';

$sql = 'SELECT * FROM etudiant';
$result = mysqli_query($conn, $sql);
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
    
</head>
<body>
    <h1 class="mb-5 mt-3 text-center">List des Etudiants</h1>

    <table class="table table-striped w-75 mx-auto">
        <thead>
            <th scope="col">n° CIN</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">date de naissance</th>
            <th scope="col">adress</th>
            <th scope="col">ville</th>
            <th scope="col">niveau scolaire</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            
                
             <?php foreach ($students as $student) : ?>

                <tr>
                    <td><?php echo $student['numCINEtu']; ?></td>
                    <td><?php echo $student['nomEtu']; ?></td>
                    <td><?php echo $student['prenomEtu']; ?></td>
                    <td><?php echo $student['dateNaissance']; ?></td>
                    <td><?php echo $student['adressEtu']; ?></td>
                    <td><?php echo $student['villeEtu']; ?></td>
                    <td><?php echo $student['niveauEtu']; ?></td>
                    <td class="d-flex gap-2">
                        <button class="btn btn-primary">Modifier</button>
                        <button class="btn btn-danger">Supprimer</button>
                    </td>
                </tr>

            <?php endforeach; ?>


            
        </tbody>
    </table>

    <section>

    <?php

    if(isset($_POST["submit"])) {

        $name = $_POST['name'];

        $sql = "SELECT * FROM etudiant WHERE nomEtu = '$name'";

        $result = mysqli_query($conn, $sql);
        $names = mysqli_fetch_all($result);

        print_r($names);


    }



    ?>
    <form action="" method="post">
        <input type="text" name="name">
        <button type="submit" name="submit">Search</button>
    </form>


    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<?php 
    mysqli_free_result($result);
    mysqli_close($conn);
?>