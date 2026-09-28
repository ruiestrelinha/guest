<?php

/**
 * Hotel directory view.
 *
 * Displays the content blocks of one property. The blocks come from the model
 * already ordered, and each one declares its own type: the loop below only picks
 * the partial that knows how to render it, so a new block never means a change
 * here.
 *
 * @var array<string, mixed>             $hotel    Property being displayed.
 * @var array<int, array<string, mixed>> $blocks   Content blocks, in display order.
 * @var array<string, mixed>             $contacts Contact details of the page.
 */

require view_path('partials/hotel-topbar');

?>
        <!-- ========== Hotel header ========== -->
        <div class="hotel-header">
            <h1 class="hotel-header-name"><?= e($hotel['name']) ?></h1>
            <p class="hotel-header-location">
                <i class="bi bi-geo-alt-fill" aria-hidden="true"></i> <?= e($hotel['location']) ?>
            </p>
            <p class="hotel-header-tagline"><?= e($hotel['tagline']) ?></p>
        </div>

        <!-- ========== Directory blocks ========== -->
        <main class="directory">

            <?php if (empty($blocks)) : ?>

                <p class="directory-empty">Informação em actualização. Contacte a receção para mais detalhes.</p>

            <?php else : ?>

                <?php foreach ($blocks as $block) : ?>
                    <?php require view_path('partials/blocks/' . $block['type']); ?>
                <?php endforeach; ?>

            <?php endif; ?>

        </main><!-- end Directory blocks -->
