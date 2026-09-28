<?php

/**
 * Actions block.
 *
 * A light card of tappable rows, used for the numbers and the shortcuts. Each
 * row is a full width target, which is what a guest expects on a phone, and the
 * ones opening an outside service are marked as such.
 *
 * @var array<string, mixed> $block Block coming from the Directory model.
 */
?>
<section class="block block-actions" id="<?= e($block['id']) ?>">

    <h2 class="block-title block-title-dark">
        <i class="bi <?= e($block['icon']) ?>" aria-hidden="true"></i>
        <?= e($block['title']) ?>
    </h2>

    <ul class="action-list">
        <?php foreach ($block['actions'] as $action) : ?>
            <?php $is_external = !empty($action['external']); ?>
            <li>
                <a class="action" href="<?= e($action['href']) ?>" <?= $is_external ? 'target="_blank" rel="noopener"' : '' ?>>
                    <span class="action-icon"><i class="bi <?= e($action['icon']) ?>" aria-hidden="true"></i></span>
                    <span class="action-body">
                        <span class="action-label"><?= e($action['label']) ?></span>
                        <span class="action-value"><?= e($action['value']) ?></span>
                    </span>
                    <i class="bi <?= $is_external ? 'bi-box-arrow-up-right' : 'bi-chevron-right' ?> action-arrow" aria-hidden="true"></i>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

</section>
