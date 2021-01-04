<?php

require 'fonctions.php';

// Variables

$action = (isset($_POST['action'])) ? $_POST['action'] : '';
$message = '';

// ACTION AJOUTER UN LOGEMENT
if ($action == 'addHousing') {
    $titre = (isset($_POST['titre']) ? $_POST['titre'] : '');
    $adresse = (isset($_POST['adresse']) ? $_POST['adresse'] : '');
    $ville = (isset($_POST['ville']) ? $_POST['ville'] : '');
    $cp = (isset($_POST['cp']) ? $_POST['cp'] : '');
    $surface = (isset($_POST['surface']) ? $_POST['surface'] : '');
    $prix = (isset($_POST['prix']) ? $_POST['prix'] : '');
    $photo = (isset($_POST['photo']) ? $_POST['photo'] : '');
    $type = (isset($_POST['type']) ? $_POST['type'] : '');
    $description = (isset($_POST['description']) ? $_POST['description'] : '');

    // tableau des erreurs :
    $erreurs = [];

    if ($titre == '') {
        $erreurs[] = 'Veuillez entrer un titre';
    }
    if ($adresse == '') {
        $erreurs[] = 'Veuillez entrer une adresse';
    }
    if ($ville == '') {
        $erreurs[] = 'Veuillez entrer un nom de ville';
    }

    if ($cp == '') {
        $erreurs[] = 'Veuillez entrer un code postal';
    }
    if (!preg_match('/^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/', $cp)) {
        $erreurs[] = 'Veuillez entrer un code postal correct';
    }

    if ($surface == '') {
        $erreurs[] = 'Veuillez indiquer une surface';
    }
    if (!preg_match('/^[0-9]+$/', $surface)) {
        $erreurs[] = 'Veuillez indiquer une surface en m²';
    }

    if ($prix == '') {
        $erreurs[] = 'Veuillez indiquer un prix';
    }

    if ($_FILES['photo']['name'] != '') {
        if ($_FILES['photo']['type'] != 'image/jpeg' && $_FILES['photo']['type'] != 'image/png' && $_FILES['photo']['type'] != 'image/gif') {
            $erreurs[] = 'Merci de choisir une photo de type JPG ou GIF ou PNG.';
        }
        if ($_FILES['photo']['size'] > 1000000) {
            $erreurs[] = 'Merci de choisir une photo de taille inférieure à 1Mo.';
        }
    }

    if ($type == '') {
        $erreurs[] = 'Veuillez choisir un type de logement';
    }

    if (!$erreurs) {
        if ($_FILES['photo']['name'] !== '') {
            if (!file_exists('./img')) {
                mkdir('./img', 0755, true);
            }

            $oldPath = $_FILES['photo']['tmp_name'];
            $newPath = './img/'.generateHash().'_'.$_FILES['photo']['name'];
            if (move_uploaded_file($oldPath, $newPath)) {
                $response = addEntry($titre, $adresse, $ville, $cp, $surface, $prix, basename($newPath), $type, $description);
            } else {
                $erreurs[] = "L'image n'a pas pu être enregistrée.";
            }
        } else {
            $response = addEntry($titre, $adresse, $ville, $cp, $surface, $prix, null, $type, $description);
        }

        if ($response) {
            $msg = 'Nouveau logement ajouté.';
        } else {
            $erreurs[] = "Erreur lors de l'ajout.";
        }
    }
}
