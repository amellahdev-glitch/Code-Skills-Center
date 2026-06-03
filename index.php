<?php
// start a session
session_start();
// include the database file
require './config/db.php';

?>



<?php include './includes/header.php'; ?>

<body>

    <?php require_once './includes/navbar.php'; ?>
    <?php require './pages/students.php'; ?>

    <!-- home page  -->

    <section id="home" class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-container">
            <div class="hero-content">
                <div class="flex-column">
                    <h1 class="fade-in">L'excellence formation professionnelle: <br><span
                            class="text-gradient">Développer vos compétences avec TULUA Institue</span></h1>
                    <p class="fade-in delay-1">Une large gamme de formations adaptées à vos ambitions, conçues par des
                        experts de l'industrie pour propulser votre carrière.</p>

                    <div class="student-card fade-in delay-2">
                        <h2>Etudiants</h2>
                        <p>Faites un grand pas vers votre nouvelle carrière en suivant l'une de nos formations
                            diplômantes.</p>
                        <div class="card-buttons">
                            <button class="btn btn-primary" onclick="openModal('registerModal')">Démarrez mon
                                inscription</button>
                            <button class="btn btn-dark" onclick="openModal('loginModal')">Connecter à mon
                                compte</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="carouselExampleAutoplaying"
                class="carousel slide my-auto d-none d-md-block align-items-center w-75" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4 overflow-hidden">
                    <div class="carousel-item active">
                        <img src="https://i.pinimg.com/736x/4f/11/26/4f11264df3395d91125b1d8fd4b929e9.jpg"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item rounded-4">
                        <img src="https://i.pinimg.com/736x/b2/03/1c/b2031c8c39c0e278d2909f375926c756.jpg"
                            class="d-block w-100" alt="...">
                    </div>

                    <div class="carousel-item rounded-4">
                        <img src="https://i.pinimg.com/736x/b1/70/f3/b170f38632dd8804206fccaef4916240.jpg"
                            class="d-block w-100" alt="...">
                    </div>



                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- <div class="hero-image-wrapper fade-in delay-2">
            <div class="tech-bg-graphic">
                <i class="fa-solid fa-laptop-code floating-icon icon-1"></i>
                <i class="fa-solid fa-language floating-icon icon-2"></i>
                <i class="fa-solid fa-graduation-cap floating-icon icon-3"></i>
                </div>
            </div> -->
    </section>

    <!-- formation part -->




    <?php

    include './pages/formation.php';

    ?>

    <!-- specialite part -->

    <?php

    include './pages/specialites.php';
    
    ?>


    <!-- session part -->


    <?php

    include './pages/session.php';

    ?>

    <!-- contact part -->


    <section id="contact" class="section-padding">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-info">
                    <h2>Contactez-nous</h2>
                    <p>Une question ? Notre équipe pédagogique est là pour vous guider dans votre choix.</p>
                    <ul class="info-list">
                        <li><i class="fa-solid fa-location-dot"></i> Rabat, Maroc</li>
                        <li><i class="fa-solid fa-phone"></i> +212 5XX XX XX XX</li>
                        <li><i class="fa-solid fa-envelope"></i> contact@tulua-institute.ma</li>
                    </ul>
                </div>
                <div class="contact-form-container">
                    <form class="contact-form" onsubmit="event.preventDefault(); alert('Message envoyé !');">
                        <input type="text" placeholder="Votre nom complet" required>
                        <input type="email" placeholder="Votre adresse email" required>
                        <textarea placeholder="Votre message" rows="4" required></textarea>
                        <button type="submit" class="btn btn-primary">Envoyer le message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include './admin/logIn.php'; ?>
    <?php require_once './includes/footer.php'; ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>
</body>

</html>