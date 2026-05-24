 <?php 
    $sql = 'SELECT * FROM formation;';
    $result = mysqli_query($conn, $sql);
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>

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