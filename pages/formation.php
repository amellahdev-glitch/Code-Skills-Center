 <?php 
    $sql = 'SELECT * FROM formation;';
    $result = mysqli_query($conn, $sql);
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>
<section id="formations" class="section-padding">
        <div class="container">
        <div class="section-header">
            <h2>Nos Formations & Spécialités</h2>
            <p>Explorez nos programmes intensifs conçus pour le marché de l'emploi.</p>
        </div>
        
        <div class="tab-container">
            <button class="tab-btn active" onclick="filterCourses('all')">Tout voir</button>
            <button class="tab-btn" onclick="filterCourses('coding')">Coding & Tech</button>
            <button class="tab-btn" onclick="filterCourses('languages')">Langues</button>
        </div>

<div class="wraped-card">
    
    <?php foreach($courses as $course) : ?>
    
    <div class="course-card coding">
        <div class="course-icon"><i class="fa-solid fa-code"></i></div>
        <h3><?php echo $course['titreForm']; ?></h3>
        <p><?php echo $course['dureeForm']; ?> Moins</p>
        <span class="badge"><p class="my-auto"><?php echo $course['prixForm']; ?> Mad</p></span>
        <button class="btn btn-primary">Get started</button>
    </div>

        <?php endforeach; ?>
</div>
</section>