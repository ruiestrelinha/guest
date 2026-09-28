<?php

/**
 * Property card.
 *
 * One property of the group, shown on the selection page as a large rectangle
 * with its photograph behind a bottom-to-top gradient that keeps the name and
 * the location readable whatever the picture.
 *
 * @var array<string, mixed> $hotel Property to display.
 */
?>
<a class="hotel-card" href="<?= e(url($hotel['slug'])) ?>">

    <img class="hotel-card-image" src="<?= e($hotel['card_image']) ?>" alt="<?= e($hotel['name']) ?>" loading="lazy" width="800" height="533">

    <!-- Dark gradient rising from the bottom edge -->
    <div class="hotel-card-overlay">
        <span class="hotel-card-category"><?= e($hotel['category']) ?></span>
        <span class="hotel-card-name"><?= e($hotel['name']) ?></span>
        <span class="hotel-card-location">
            <i class="bi bi-geo-alt-fill" aria-hidden="true"></i> <?= e($hotel['location_short']) ?>
        </span>
    </div>

</a>
