<?php 
include'../includes/config.php';
$students = [];
    

    if(isset($_POST['submit'])) {

        $name = $_POST['name'];

        $sql = "SELECT * FROM etudiant WHERE nomEtu =  '$name'";
        $result = mysqli_query($conn, $sql);
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>
<body>


    <h1 class="mb-5 mt-3 text-center">List des Etudiants</h1>


    <form action="" method="post" class="d-flex gap-4">
        <input type="text" name="name" class="">
        <button type="submit" class="btn btn-primary" name="submit">Search</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<?php 
    if(isset($_POST['submit'])) {
        mysqli_free_result($result);

    }
    mysqli_close($conn);
