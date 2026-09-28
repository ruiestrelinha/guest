<?php

/**
 * Property selection view.
 *
 * Landing page of the guest directory: the guest picks the hotel they are staying
 * in, and each card opens that property directory.
 *
 * @var array<int, array<string, mixed>> $hotels   Properties of the group.
 * @var array<string, mixed>             $contacts Contact details of the page.
 * @var string                           $logo     Logo of the group.
 */

require view_path('partials/topbar');

?>
        <!-- ========== Group logo ========== -->
        <div class="group-logo">
            <img src="<?= e($logo) ?>" alt="<?= e(APP_NAME) ?>" width="220" height="66">
        </div>

        <!-- ========== Property list ========== -->
        <main class="property-list">

            <?php if (empty($hotels)) : ?>

                <p class="property-list-empty">Não há hotéis disponíveis de momento.</p>

            <?php else : ?>

                <?php foreach ($hotels as $hotel) : ?>
                    <?php require view_path('partials/hotel-card'); ?>
                <?php endforeach; ?>

            <?php endif; ?>

        </main><!-- end Property list -->
