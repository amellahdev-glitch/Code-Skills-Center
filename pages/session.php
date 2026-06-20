<?php

$stmt = $pdo->query("SELECT * FROM session;");

$sessions = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<section id="sessions" class="section-padding bg-light">

    <div class="container">
        <div class="section-header">
            <h2>Prochaines Sessions</h2>
            <p>Inscrivez-vous dès maintenant, les places sont limitées pour un encadrement optimal.</p>
        </div>

        <div class="scroll-box">


            <!-- <table class="table table-striped">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Session</th>
                        <th scope="col">Date début</th>
                        <th scope="col">Date fin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col"></td>
                        <td class="col"></td>
                        <td class="col"></td>
                    </tr>
                </tbody>
            </table> -->
            
            <?php foreach ($sessions as $session): ?>
            <details>
                <summary><?php echo $session['nomSess']; ?></summary>
                <p>Debut: <?php echo date('d/m/Y', strtotime($session['dateDebut'])); ?></p>
                <p>Fin: <?php echo date('d/m/Y', strtotime($session['dateFin'])); ?></p>
            </details>
            <?php endforeach; ?>

        </div>

    </div>
</section>