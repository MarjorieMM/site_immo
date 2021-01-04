<!-- affichage des éventuels messages de confirmation ou d'erreurs -->

<div class="row">
    <div class="col-12 text-center">
        <?php
            if (isset($msg)) {
                echo "<div class='alert alert-success'>$msg</div>";
            }
            if (isset($erreurs)) {
                foreach ($erreurs as $erreur) {
                    echo "<div class='alert alert-danger'>$erreur</div>";
                }
            }
        ?>
    </div>
</div>