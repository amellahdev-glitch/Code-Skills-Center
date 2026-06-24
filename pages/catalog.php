<?php

// Fetch all specialties for the filtration headers
$stmtSpecs = $pdo->query("SELECT * FROM specialite;");
$specialties = $stmtSpecs->fetchAll(PDO::FETCH_ASSOC);

// Fetch only the courses linked to specialties via the catalogue table
$query = "SELECT 
        f.codeForm,
        f.titreForm,
        f.dureeForm,
        f.prixForm,
        s.codeSpec,
        s.nomSpec
    FROM catalogue c
    INNER JOIN formation f ON c.codeForm = f.codeForm
    INNER JOIN specialite s ON c.codeSpec = s.codeSpec
";
$stmtCatalog = $pdo->query($query);
$courses = $stmtCatalog->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
    .nav-btn {
        background-color: white;
        color: #6c757d;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 8px 20px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .nav-btn:hover {
        background-color: #f8f9fa;
        color: #495057;
    }

    .nav-btn.active {
        background-color: #1d4ed8;
        color: white;
        border-color: #1d4ed8;
    }

    .session-card {
        background: white;
        border: none;
        border-radius: 12px;
        border-top: 4px solid #6366f1;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .session-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    }

    .card-title-main {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2d3748;
        letter-spacing: -0.5px;
    }

    .code-badge {
        background-color: #eff6ff;
        color: #1d4ed8;
        padding: 2px 8px;
        border-radius: 4px;
        font-weight: 600;
    }

    .info-label {
        color: #718096;
        font-size: 0.95rem;
    }

    .info-value {
        color: #1a202c;
        font-weight: 600;
        font-size: 0.95rem;
    }
</style>
</head>

<body>

    <div class="container">

        <div class="section-header">
            <h2>Catalogue des Formations</h2>
            <p>Explorez nos Formations intensifs conçus pour le marché de l'emploi.</p>
        </div>


        <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
            <button class="btn nav-btn active" data-filter="all">Tous</button>
            <?php foreach ($specialties as $spec): ?>
                <button class="btn nav-btn" data-filter="<?= htmlspecialchars($spec['codeSpec']) ?>">
                    <?= htmlspecialchars($spec['nomSpec']) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="row g-4" id="sessions-grid">
            <?php if (!empty($courses)): ?>
                <?php foreach ($courses as $course): ?>
                    <div class="col-12 col-md-6 col-lg-4 course-item" data-spec="<?= htmlspecialchars($course['codeSpec']) ?>">
                        <div class="card session-card h-100 p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="code-badge">Ref: <?= htmlspecialchars($course['codeForm']) ?></span>
                                    <small class="text-muted">Spec #<?= htmlspecialchars($course['codeSpec']) ?></small>
                                </div>

                                <h3 class="card-title-main mb-3">
                                    <?= htmlspecialchars($course['titreForm']) ?>
                                </h3>

                                <div class="small text-muted mb-1">
                                    <strong>Durée:</strong> <?= htmlspecialchars($course['dureeForm']) ?> Heures
                                </div>
                                <div class="small text-muted">
                                    <strong>Prix:</strong> <?= htmlspecialchars($course['prixForm']) ?> DH
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
                                <span class="info-label">Filière:</span>
                                <span class="info-value text-primary"><?= htmlspecialchars($course['nomSpec']) ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Aucune formation n'est actuellement liée au catalogue.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.querySelectorAll('.nav-btn').forEach(button => {
            button.addEventListener('click', function () {
                document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const chosenSpecId = this.getAttribute('data-filter');
                const items = document.querySelectorAll('.course-item');

                items.forEach(item => {
                    const itemSpecId = item.getAttribute('data-spec');

                    if (chosenSpecId === 'all' || itemSpecId === chosenSpecId) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>