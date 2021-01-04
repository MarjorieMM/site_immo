<?php

require_once 'constantes.php';

function seeArray($tab)
{
    echo '<pre>';

    print_r($tab);

    echo '</pre>';
}

function generateHash()
{
    return time().'_'.rand();
}

// FONCTION CONNEXION A LA BDD

function connexion()
{
    try {
        $options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
        $db = new PDO('mysql:host='.HOST.';dbname='.BDD, LOGIN, PWD, $options);

        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
}

// FONCTION AJOUTER UN LOGEMENT

function addEntry($titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type, $description)
{
    $db = connexion();

    if ($photo && $description) { // tout
        $sql = 'INSERT INTO logement VALUES(NULL, :titre, :adresse, :ville, :cp,:surface, :prix, :photo, :type, :description )';
    } elseif ($photo && !$description) { // tout sauf description
        $sql = 'INSERT INTO logement VALUES(NULL, :titre, :adresse, :ville, :cp,:surface, :prix, :photo, :type, Null )';
    } elseif (!$photo && $description) { // tout sauf photo
        $sql = 'INSERT INTO logement VALUES(NULL, :titre, :adresse, :ville, :cp,:surface, :prix, Null, :type, :description )';
    } else {// tout sauf photo et description
        $sql = 'INSERT INTO logement VALUES(NULL, :titre, :adresse, :ville, :cp,:surface, :prix, NULL, :type, NULL )';
    }

    try {
        $query = $db->prepare($sql);

        if ($photo && $description) { // tout
            $query->execute(['titre' => $titre, 'adresse' => $adresse, 'ville' => $ville, 'cp' => $cp, 'surface' => $surface, 'prix' => $prix, 'photo' => $photo, 'type' => $type, 'description' => $description]);
        } elseif ($photo && !$description) { // tout sauf description
            $query->execute(['titre' => $titre, 'adresse' => $adresse, 'ville' => $ville, 'cp' => $cp, 'surface' => $surface, 'prix' => $prix, 'photo' => $photo, 'type' => $type]);
        } elseif (!$photo && $description) { // tout sauf photo
            $query->execute(['titre' => $titre, 'adresse' => $adresse, 'ville' => $ville, 'cp' => $cp, 'surface' => $surface, 'prix' => $prix, 'type' => $type, 'description' => $description]);
        } else {// tout sauf photo et description
            $query->execute(['titre' => $titre, 'adresse' => $adresse, 'ville' => $ville, 'cp' => $cp, 'surface' => $surface, 'prix' => $prix, 'type' => $type]);
        }

        return true;
    } catch (PDOException $e) {
        // echo $e->getMessage();

        return false;
    }
}

// FONCTION LISTER LES LOGEMENTS

function listEntries()
{
    $db = connexion();

    // sql
    $sql = 'SELECT * FROM logement';

    // execution de l'ordre
    try {
        $query = $db->query($sql);
        $logements = $query->fetchAll(PDO::FETCH_ASSOC);

        return $logements;
    } catch (PDOException $e) {
        // echo $e->getMessage();
    }
}

// FONCTION AFFICHER UN LOGEMENT PAR SON ID

function getHousing($id)
{ // connexion
    $db = connexion();

    $id = $db->quote($id);

    $sql = "SELECT * FROM logement WHERE id_logement=$id";

    try {
        $query = $db->query($sql);

        $logement = $query->fetch(PDO::FETCH_ASSOC);

        return $logement;
    } catch (PDOException $e) {
        // echo $e->getMessage();

        return false;
    }
}