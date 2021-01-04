<?php
require_once 'actions.php';
require_once 'fonctions.php';
require_once 'constantes.php';

?>


<!DOCTYPE html>
<html lang="fr">
    <?php

$id = (isset($_GET['id']) ? $_GET['id'] : '');

$logement = getHousing($id);
    ?>

    <head>
        <?php
       include 'elements/head.php';
    ?>
    </head>

    <body>
        <header>
            <?php
include 'elements/main_menu.php';

?>
        </header>
        <div class="container">
            <div class="card <?php echo $logement['type'] == 'Vente' ? 'card-sell' : 'card-rent'; ?>">
                <p class="text-center"><?php echo $logement['type'].' n°'.$logement['id_logement']; ?></p>
                <?php if ($logement['photo'] !== null) { ?>

                <img class="card-img-top" src="img/<?php echo $logement['photo']; ?>"
                    alt="<?php echo $logement['titre']; ?>">
                <?php
                } else {  ?>
                <h3 class="text-center">Pas de photo disponible</h3>
                <?php  } ?>

                <div class="card-body">
                    <h4 class="card-title"><?php echo $logement['titre']; ?></h4>
                    <p class="card-text"><?php echo $logement['description']; ?></p>
                    <p class="card-text">Adresse du bien :
                        <br> <?php echo $logement['adresse'].' '.$logement['cp'].' '.$logement['ville']; ?>
                    </p>
                    <div class="row">
                        <div class="col-6">
                            <p class="card-text">Surface :
                                <?php echo number_format($logement['surface'], 0, ',', ' '); ?> m²</p>

                        </div>
                        <div class="col-6">
                            <p class="card-text">Prix :
                                <?php echo number_format($logement['prix'], 0, ',', ' ').' €'; echo $logement['type'] == 'Location' ? ' / par mois' : ''; ?>
                            </p>

                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">Modifier</a>
                </div>
            </div>
        </div>
    </body>

</html>