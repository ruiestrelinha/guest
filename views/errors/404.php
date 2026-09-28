<?php

/**
 * Not found view.
 *
 * Shown for any address that matches no route. It offers the only useful way out:
 * the property selection page.
 *
 * @var array<string, mixed> $contacts Contact details of the page.
 */
?>
<!-- ========== Not found ========== -->
<main class="error-page">

    <span class="error-page-icon"><i class="bi bi-signpost-split" aria-hidden="true"></i></span>

    <h1 class="error-page-title">Página não encontrada</h1>

    <p class="error-page-text">
        O endereço que abriu não existe ou foi alterado. Volte à seleção de hotel
        para encontrar o diretório da sua estadia.
    </p>

    <a class="btn-accent" href="<?= e(url('selection')) ?>">
        <i class="bi bi-house" aria-hidden="true"></i> Voltar ao início
    </a>

</main><!-- end Not found -->
