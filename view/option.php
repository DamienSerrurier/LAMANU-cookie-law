<div class="wrap">
<!-- L'action de la balise form doit options du fichier de Wordpress -->
    <form action="options.php" method="post">
        <h1>Configuration du plugin</h1>
        <fieldset>
            <legend>Google Analytics</legend>
            <?php 
            // Cette fonction est appelé dans la balise form pour l'autoriser l'enregistrement en base de données
            settings_fields('LAMANU_GoogleAnalytics');
            // Rappel des paramètres créés pour la configuration
            do_settings_sections('Configuration'); ?>
            <label for="analytics">ID Google Analytics</label>
            <input type="text" name="google_analytics" id="google_analytics" value="<?= get_option('google_analytics', 'UA-00000000-0') ?>" placeholder="ID Google Analytics">
            <?= submit_button('ID enregistré') ?>
        </fieldset>
    </form>
</div>