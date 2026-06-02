<?php 
// include'../includes/config.php';
// $students = [];
    

//     if(isset($_POST['submit'])) {

//         $name = $_POST['name'];

//         $sql = "SELECT * FROM etudiant WHERE nomEtu =  '$name'";
//         $result = mysqli_query($conn, $sql);
//         $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

//     }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Admin dashbord</title>
    <style>
        #dashbord {
            min-height: 100vh !important;
        }

        nav {
            border-right: 2px solid black;
        }
    </style>
</head>
<body>

    <main id="dashbord" class="d-flex">
        <nav class="h-auto w-25 d-flex justify-content-start flex-column">
            <a href="../index.php" class="mx-auto mb-5 my-3">
                <img width="200" class="" src="../assets/images/logo.png" alt="">
            </a>
            <ul class="nav flex-column gap-3 align-items-center mt-5 w-100">
                <li class="nav-itme w-100 d-flex justify-content-center" style="border-bottom: 2px solid black;"><a class="nav-link fs-3 fw-bold text-secondary" href="">Formation</a></li>
                <li class="nav-itme w-100 d-flex justify-content-center" style="border-bottom: 2px solid black;"><a class="nav-link fs-3 fw-bold text-secondary" href="">Etudiant</a></li>
                <li class="nav-itme w-100 d-flex justify-content-center" style="border-bottom: 2px solid black;"><a class="nav-link fs-3 fw-bold text-secondary" href="">Session</a></li>
                <li class="nav-itme w-100 d-flex justify-content-center" style="border-bottom: 2px solid black;"><a class="nav-link fs-3 fw-bold text-secondary" href="">Specialité</a></li>
            </ul>
        </nav>
        <div class="content w-75">

        </div>
    </main>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<?php 
    // if(isset($_POST['submit'])) {
    //     mysqli_free_result($result);

    // }
    // mysqli_close($conn);
