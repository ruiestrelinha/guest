<?php

/**
 * Settings sheet.
 *
 * Bootstrap offcanvas opened by the menu icon of the top bar. It gathers the
 * numbers a guest may need outside reception hours, and the emergency numbers
 * that are the same whatever hotel they are staying in.
 *
 * @var array<string, mixed> $settings Contents built by the controller.
 */
?>
<!-- ========== Settings sheet ========== -->
<div class="offcanvas offcanvas-end settings-sheet" tabindex="-1" id="settings-sheet" aria-labelledby="settings-sheet-title">

    <div class="offcanvas-header">
        <div>
            <h2 class="settings-sheet-title" id="settings-sheet-title"><?= e($settings['title']) ?></h2>
            <p class="settings-sheet-subtitle"><?= e($settings['subtitle']) ?></p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
    </div>

    <div class="offcanvas-body">

        <!-- Direct contacts of the hotel in context -->
        <h3 class="settings-sheet-heading">Contactos</h3>
        <ul class="settings-list">
            <?php foreach ($settings['links'] as $link) : ?>
                <li>
                    <a class="settings-link" href="<?= e($link['href']) ?>" <?= !empty($link['external']) ? 'target="_blank" rel="noopener"' : '' ?>>
                        <span class="settings-link-icon"><i class="bi <?= e($link['icon']) ?>" aria-hidden="true"></i></span>
                        <span class="settings-link-body">
                            <span class="settings-link-label"><?= e($link['label']) ?></span>
                            <span class="settings-link-value"><?= e($link['value']) ?></span>
                        </span>
                        <i class="bi bi-chevron-right settings-link-arrow" aria-hidden="true"></i>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Emergency numbers: always the same, whatever the property -->
        <?php if (!empty($settings['emergency'])) : ?>
            <h3 class="settings-sheet-heading">Emergência</h3>
            <ul class="settings-list">
                <?php foreach ($settings['emergency'] as $number) : ?>
                    <li>
                        <a class="settings-link" href="<?= e($number['href']) ?>">
                            <span class="settings-link-icon settings-link-icon-alert"><i class="bi <?= e($number['icon']) ?>" aria-hidden="true"></i></span>
                            <span class="settings-link-body">
                                <span class="settings-link-label"><?= e($number['label']) ?></span>
                                <span class="settings-link-value"><?= e($number['value']) ?></span>
                            </span>
                            <i class="bi bi-chevron-right settings-link-arrow" aria-hidden="true"></i>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- About -->
        <?php if (!empty($settings['about'])) : ?>
            <h3 class="settings-sheet-heading">Sobre</h3>
            <p class="settings-about"><?= e($settings['about']) ?></p>
            <p class="settings-version"><?= e(APP_NAME) ?> &middot; <?= e(APP_YEAR) ?></p>
        <?php endif; ?>

    </div>

</div><!-- end Settings sheet -->
