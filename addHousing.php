<?php
require_once 'actions.php';
require_once 'fonctions.php';
require_once 'constantes.php';

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
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
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name='action' value='addHousing'>
                    <div class="row">
                        <div class="col-12 mt-5 text-center">
                            <h3>Entrez un nouveau logement</h3>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Champ titre -->
                        <div class="form-group col-12 col-sm-6 col-md-4 my-2 my-lg-3">
                            <input type="text" class="form-control" id='titre' name='titre' placeholder="Titre">
                        </div>

                        <!-- Champ adresse -->
                        <div class="form-group col-12 col-sm-6 col-md-4 my-2 my-lg-3">
                            <input type="text" class="form-control" id='adresse' name='adresse' placeholder="N° et rue">
                        </div>

                        <!-- Champ ville -->
                        <div class="form-group col-12 col-sm-6 col-md-4 my-2 my-lg-3">
                            <input type="text" class="form-control" id='ville' name='ville' placeholder="Ville">
                        </div>
                    </div>
                    <div class="row">

                        <!-- Champ CP -->
                        <div class="form-group col-12 col-sm-6 col-md-4 my-2 my-lg-3">
                            <input type="text" class="form-control" id='cp' name='cp' placeholder="Code Postal">
                        </div>

                        <!-- Champ surface -->
                        <div class="form-inline col-12 col-sm-6 col-md-4 my-2 my-lg-3">
                            <input type="text" class="form-control" id='surface' name='surface'
                                placeholder="Surface">&nbsp m²
                        </div>

                        <!-- Champ prix -->
                        <div class="form-inline col-12 col-sm-6 col-md-4 my-2 my-lg-3">
                            <input type="text" class="form-control" id='prix' name='prix' placeholder="prix">&nbsp €
                        </div>
                    </div>

                    <div class="row">
                        <!-- Champ photo -->

                        <div class="col-12 col-md-6 my-2 my-lg-3 custom-file  form-control-sm ml-3" id="photoLabel">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label custom-file-control" for="photoLabel">Photo</label>
                        </div>

                        <!-- Champ type -->

                        <div class=" col-12 col-md-6 my-2 my-lg-3 form-group row">
                            <label for="type" class=" mx-4">Choisir un type :</label>
                            <div class="form-check mx-4">
                                <input class="form-check-input" type="radio" name="type" id="type" value="Location"
                                    checked>
                                <label class="form-check-label" for="Location">
                                    Location
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="type" value="Vente">
                                <label class="form-check-label" for="Vente">
                                    Vente
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <!-- Champ description -->
                        <div class="form-group col-12 my-2 my-lg-3">
                            <label for="description">Entrez une description du bien :</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Ajouter un logement</button>
                        </div>
                    </div>
            </div>
            </form>


            <?php
include_once './elements/messages.php';
                ?>




            </div>
        </main>



        <?php
include_once 'elements/scripts.php';

?>
    </body>

</html>