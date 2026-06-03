<?php


$stmt = $pdo->query("SELECT * FROM specialite;");

$specialites = $stmt->fetchAll(PDO::FETCH_ASSOC);

function isActive($status) {
    if ($status == 1) {
        return 'Active';
    } else  {
        return 'Non Active';
    }
}

?>




<section id="specialites" class="section-padding">
    <div class="container">
        <div class="section-header">
            <h2>Nos Spécialités</h2>
            <!-- <p>Explorez nos programmes intensifs conçus pour le marché de l'emploi.</p> -->
        </div>

        <table class="table table-hover table-striped">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Nom de specialités</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($specialites as $specialite) : ?>
                <tr>
                    <th><?php echo $specialite['descSpec']; ?></th>
                    <th><?php echo isActive($specialite['Active']); ?></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    
        </div> 
</section>