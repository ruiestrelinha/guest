<?php

/**
 * Bottom navigation bar.
 *
 * Fixed bar with the four shortcuts a guest reaches for most often. The numbers
 * come from the page in context, so inside a directory they dial that hotel and
 * on the selection page they dial the group.
 *
 * @var array<string, mixed> $contacts Contact details of the page in context.
 */

// The four entries are built here rather than written out four times, so the
// active state and the markup stay in one place.
$nav_items = [
    [
        'icon' => 'bi-telephone',
        'label' => 'Ligar',
        'href' => tel_link((string) $contacts['phone']),
        'route' => null,
    ],
    [
        'icon' => 'bi-bell',
        'label' => 'Recepção',
        'href' => tel_link((string) $contacts['reception']),
        'route' => null,
    ],
    [
        'icon' => 'bi-house',
        'label' => 'Início',
        'href' => url('selection'),
        'route' => 'selection',
    ],
    [
        'icon' => 'bi-geo-alt',
        'label' => 'Mapa',
        'href' => (string) $contacts['maps'],
        'route' => null,
        'external' => true,
    ],
];

?>
        <nav class="bottom-nav" aria-label="Navegação principal">
            <?php foreach ($nav_items as $item) : ?>
                <?php
                // "Início" is the only entry that points at a page of the
                // application: the other three open the dialler or the maps, and
                // none of them can be the page being displayed.
                $is_active = $item['route'] !== null && is_current($item['route']);
                ?>
                <a class="bottom-nav-item<?= $is_active ? ' active' : '' ?>"
                    href="<?= e($item['href']) ?>"
                    <?= $is_active ? 'aria-current="page"' : '' ?>
                    <?= !empty($item['external']) ? 'target="_blank" rel="noopener"' : '' ?>>
                    <i class="bi <?= e($item['icon']) ?>" aria-hidden="true"></i>
                    <span><?= e($item['label']) ?></span>
                </a>
            <?php endforeach; ?>
        </nav>
