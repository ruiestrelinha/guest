<?php

/**
 * Solid colour block.
 *
 * A plain card in one of the two house tones - sage green or taupe - used for the
 * services of the hotel. The tone is part of the data, so the same partial serves
 * every service and the rhythm of the page stays even.
 *
 * @var array<string, mixed> $block Block coming from the Directory model.
 */
?>
<section class="block block-solid block-solid-<?= e($block['tone']) ?>" id="<?= e($block['id']) ?>">

    <div class="block-solid-header">
        <span class="block-solid-icon"><i class="bi <?= e($block['icon']) ?>" aria-hidden="true"></i></span>
        <h2 class="block-title"><?= e($block['title']) ?></h2>
    </div>

    <?php if (!empty($block['text'])) : ?>
        <p class="block-text"><?= e($block['text']) ?></p>
    <?php endif; ?>

    <?php if (!empty($block['details'])) : ?>
        <dl class="block-details">
            <?php foreach ($block['details'] as $detail) : ?>
                <div class="block-detail">
                    <dt><?= e($detail['label']) ?></dt>
                    <dd><?= e($detail['value']) ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    <?php endif; ?>

    <?php if (!empty($block['note'])) : ?>
        <p class="block-note">
            <i class="bi bi-info-circle" aria-hidden="true"></i>
            <span><?= e($block['note']) ?></span>
        </p>
    <?php endif; ?>

</section>
