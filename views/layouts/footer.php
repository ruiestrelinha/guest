<?php

/**
 * Shared page footer.
 *
 * Prints the copyright notice, closes the application container and loads the
 * scripts. The settings sheet and the bottom bar are included here because every
 * page has them.
 *
 * @var array<string, mixed> $contacts Contact details of the page in context.
 * @var array<string, mixed> $settings Contents of the settings sheet.
 */
?>
        <!-- ========== Footer ========== -->
        <footer class="app-footer">
            <p class="app-footer-copyright">&copy; <?= e(APP_YEAR) ?> <?= e(APP_NAME) ?>. Todos os direitos reservados.</p>
            <p class="app-footer-note">Diretório digital de estadia.</p>
        </footer>

        <?php require view_path('layouts/bottom-nav'); ?>

    </div><!-- end Application container -->

    <?php require view_path('partials/settings-sheet'); ?>

    <!-- JS Vendor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JS Main -->
    <script src="<?= e(asset('js/main.js')) ?>"></script>

</body>

</html>
