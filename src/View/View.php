<?php
require_once __DIR__ . '/../Model/ModelBD.php'; // Inclure le fichier de définition de la classe ModelBD
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<?php if ($cheminVueBody === "creacompte.php"): ?>
        <link href="../web/css/sae1.css" rel="stylesheet">
    <?php elseif ($cheminVueBody === "meteoteque.php"): ?>
        <link href="../web/css/sae1.css" rel="stylesheet">
    <?php elseif ($cheminVueBody === "compte.php"): ?>
        <link href="../web/css/sae1.css" rel="stylesheet">
    <?php elseif ($cheminVueBody === "connection.php"): ?>
        <link href="../web/css/sae1.css" rel="stylesheet">
    <?php else: ?>
		<link href="../web/css/station.css" rel="stylesheet">	
    <?php endif; ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=acceuil">MétéoApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=acceuil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=station">Stations</a>
                </li>
                <li>
                    <a class="nav-link" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=pagerech">Recherche</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=meteoteque">Méteothèque</a>
                </li>
                <?php if (ModelBD::exist($_SESSION['user']['id'] ?? null) && ModelBD::getrole($_SESSION['user']['id']?? null)  != 'attente'): ?>
                    <li class="nav-item">
						<a class="nav-link" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=consultation">Consultation</a>
					</li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=compte">Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=deconnexion">Déconnexion</a>
                    </li>
                <?php elseif (ModelBD::getrole($_SESSION['user']['id']?? null) != 'attente'):?>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=creacompte">Créer un compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=connexion&nom=&prenom=&id=">Connexion</a>
                    </li>
                    <?php endif; ?>
                <?php if (ModelBD::getrole($_SESSION['user']['id'] ?? NULL) == 'admin'){?>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/sae/web/frontcontroller.php?controller=controller&action=admin">Admin</a>
                    </li>
                <?php }; ?>

            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <?php
    require __DIR__. "/{$cheminVueBody}";
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
