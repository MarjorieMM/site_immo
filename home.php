<?php
require_once 'actions.php';
require_once 'fonctions.php';
require_once 'constantes.php';

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <link rel="stylesheet" href="css/style.css">
        <?php
include_once 'elements/head.php';
?>
    </head>

    <body>
        <header>
            <?php
include 'elements/main_menu.php';

?>
        </header>
        <main>
            <div class="container">

                <?php
include './elements/messages.php';
                ?>

                <div class="row">
                    <div class="col-12 text-center">

                        <h3>Listing</h3>
                    </div>
                    <table class="table table-striped text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>photo</th>
                                <th>Titre</th>
                                <th>Adresse</th>
                                <th>Code Postal</th>
                                <th>Ville</th>
                                <th>Surface</th>
                                <th>Prix</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $logements = listEntries();
                    if (count($logements) < 1) { ?>
                            <tr>
                                <th scope="row" colspan="12" class="text-center">Pas de logement à afficher</td>
                            </tr>
                            <?php
                        } else {
                            $num = 1;
                            foreach ($logements as $logement) {
                                ?> <tr>
                                <th scope="row"><?php echo $num++; ?></td>
                                <td>
                                    <?php
                if ($logement['photo'] !== null) { ?>
                                    <img width="100" class="img-thumbnail" src="./img/<?php echo $logement['photo']; ?>"
                                        alt="photo de <?php echo $logement['titre']; ?>">
                                    <?php
                } ?>
                                </td>
                                <td><?php echo $logement['titre']; ?></td>
                                <td><?php echo $logement['adresse']; ?></td>
                                <td><?php echo $logement['cp']; ?></td>
                                <td><?php echo $logement['ville']; ?></td>
                                <td><?php echo $logement['surface']; ?> m²</td>
                                <td><?php echo $logement['prix']; ?> €</td>

                                <td><?php echo $logement['type']; ?></td>
                                <td>
                                    <div class="desc"><?php echo $logement['description']; ?></div>
                                </td>
                                <td><a href="showDetails.php?id=<?php echo $logement['id_logement']; ?>">Voir les
                                        détails</td></a>
                            </tr>
                            <?php
                            }
                        }?>


                        </tbody>
                    </table>




                </div>


            </div>
        </main>



        <?php
require 'elements/scripts.php';

?>
    </body>

</html>