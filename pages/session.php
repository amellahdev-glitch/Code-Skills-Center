<?php

$sql = "SELECT * FROM session;";
$result = mysqli_query($conn, $sql);
$sessions = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>



<section id="sessions" class="section-padding bg-light">

    <div class="container">
        <div class="section-header">
            <h2>Prochaines Sessions</h2>
            <p>Inscrivez-vous dès maintenant, les places sont limitées pour un encadrement optimal.</p>
        </div>

        <div class="scroll-box">


            <table class="table table-striped">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Session</th>
                        <th scope="col">Date début</th>
                        <th scope="col">Date fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sessions as $session): ?>
                        <tr>
                            <td class="col"><?php echo $session['nomSess']; ?></td>
                            <td class="col"><?php echo date('d/m/Y', strtotime($session['dateDebut'])); ?></td>
                            <td class="col"><?php echo date('d/m/Y', strtotime($session['dateFin'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</section>