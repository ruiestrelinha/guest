<?php

/**
 * Top bar of a hotel directory.
 *
 * Stays glued to the top of the screen while the guest scrolls the directory, so
 * the way back to the selection page is always one tap away.
 *
 * @var array<string, mixed> $hotel Property being displayed.
 */
?>
<!-- ========== Sticky Top Bar ========== -->
<header class="hotel-topbar" id="hotel-topbar">

    <a class="hotel-topbar-back" href="<?= e(url('selection')) ?>" aria-label="Voltar à seleção de hotel">
        <i class="bi bi-chevron-left" aria-hidden="true"></i>
    </a>

    <img class="hotel-topbar-logo" src="<?= e($hotel['logo']) ?>" alt="<?= e($hotel['name']) ?>" width="160" height="48">

    <button class="hotel-topbar-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#settings-sheet" aria-controls="settings-sheet" aria-label="Abrir definições e contactos">
        <i class="bi bi-list" aria-hidden="true"></i>
    </button>

</header><!-- end Sticky Top Bar -->
