<?php

/**
 * Top bar of the selection page.
 *
 * Carries the page title between the two shortcuts a guest looks for first:
 * the settings sheet and the location of the group.
 *
 * @var array<string, mixed> $contacts Contact details of the page in context.
 */
?>
<!-- ========== Top Bar ========== -->
<header class="topbar">

    <button class="topbar-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#settings-sheet" aria-controls="settings-sheet" aria-label="Abrir definições e contactos">
        <i class="bi bi-list" aria-hidden="true"></i>
    </button>

    <h1 class="topbar-title">Selecionar Hotel</h1>

    <a class="topbar-icon" href="<?= e($contacts['maps']) ?>" target="_blank" rel="noopener" aria-label="Ver a localização no mapa">
        <i class="bi bi-geo-alt" aria-hidden="true"></i>
    </a>

</header><!-- end Top Bar -->
