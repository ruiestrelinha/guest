<?php

/**
 * Group-wide contact details.
 *
 * These are the numbers a guest may need before choosing a hotel - or when the
 * directory is opened from a page that belongs to no single property. They are
 * shown by the bottom bar and by the settings sheet of the selection page.
 *
 * PLACEHOLDER CONTENT - replace every value below with the details confirmed by
 * the front desk before the directory goes live.
 */

return [

    // Logo of the group, centred under the top bar of the selection page.
    'logo' => 'https://placehold.co/440x132/ffffff/b59b5e?text=HOT%C3%89IS+MIRAMAR',

    // Central line of the group, used before a property has been chosen.
    'phone' => '+351 262 000 100',
    'reception' => '+351 262 000 101',
    'email' => 'geral@hoteismiramar.pt',
    'address' => 'Nazaré, Portugal',

    // Search the maps shortcut of the selection page opens.
    'maps' => 'https://www.google.com/maps/search/?api=1&query=Hot%C3%A9is+Miramar+Nazar%C3%A9',

    // Emergency numbers. The European emergency number is the same in every
    // member state, so it is listed first and always reachable.
    'emergency' => [
        [
            'icon' => 'bi-exclamation-triangle',
            'label' => 'Emergência',
            'value' => '112',
            'href' => 'tel:112',
        ],
        [
            'icon' => 'bi-shield-check',
            'label' => 'Polícia (GNR)',
            'value' => '213 217 000',
            'href' => 'tel:213217000',
        ],
        [
            'icon' => 'bi-life-preserver',
            'label' => 'Saúde 24',
            'value' => '808 24 24 24',
            'href' => 'tel:808242424',
        ],
    ],

    // Printed at the bottom of the settings sheet.
    'about' => 'Diretório digital de estadia dos Hotéis Miramar. Reúne, num só sítio, '
        . 'a informação prática de que precisa durante a sua estadia na Nazaré.',
];
