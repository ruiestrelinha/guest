<?php

/**
 * Image block.
 *
 * A full width photograph behind a dark overlay, used for the practical
 * information the guest needs on arrival and for the sights around the hotel.
 *
 * The photograph is a real <img> rather than a CSS background: it can carry an
 * alternative text for the guests using a screen reader, and the browser is free
 * to defer loading it until the guest scrolls down to it.
 *
 * @var array<string, mixed> $block Block coming from the Directory model.
 */
?>
<section class="block block-image" id="<?= e($block['id']) ?>">

    <img class="block-image-bg" src="<?= e($block['image']) ?>" alt="<?= e($block['image_alt'] ?? '') ?>" loading="lazy" width="800" height="533">

    <!-- Dark overlay: keeps the white text readable over any photograph -->
    <div class="block-image-overlay"></div>

    <div class="block-image-content">

        <h2 class="block-title">
            <i class="bi <?= e($block['icon']) ?>" aria-hidden="true"></i>
            <?= e($block['title']) ?>
        </h2>

        <?php if (!empty($block['intro'])) : ?>
            <p class="block-intro"><?= e($block['intro']) ?></p>
        <?php endif; ?>

        <?php if (!empty($block['items'])) : ?>
            <ul class="block-list">
                <?php foreach ($block['items'] as $item) : ?>
                    <li class="block-list-item">
                        <i class="bi <?= e($item['icon']) ?>" aria-hidden="true"></i>
                        <span class="block-list-label"><?= e($item['label']) ?></span>
                        <span class="block-list-value"><?= e($item['value']) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </div>

</section>
