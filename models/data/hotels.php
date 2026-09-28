<?php

/**
 * Properties of the group.
 *
 * The array key is the slug of the property and is also its friendly URL, so
 * "miramar-spa" answers /miramar-spa. Adding a hotel here is enough to publish
 * its page: the front controller builds the route from this file.
 */

return [

    // ---------------------------------------------------------------------
    // Miramar Hotel & SPA
    // ---------------------------------------------------------------------
    'miramar-spa' => [
        'slug' => 'miramar-spa',
        'name' => 'Miramar Hotel & SPA',
        'location' => 'Nazaré · Avenida da República',
        'location_short' => 'Nazaré',
        'category' => 'Hotel 4 estrelas',
        'tagline' => 'Vista de mar, SPA e acesso directo à praia',

        // Meta description of the directory page.
        'description' => 'Diretório digital do Miramar Hotel & SPA, Nazaré: informação útil, Wi-Fi, '
            . 'restaurante, SPA e contactos da receção.',

        // Card photograph of the selection page. Built with asset() rather than
        // written as a relative path, so the address stays correct whatever the
        // route depth and wherever the application is served from.
        'card_image' => asset('images/miramarhotelspa_card.jpg'),
        'logo' => 'https://placehold.co/320x96/ffffff/b59b5e?text=MIRAMAR+HOTEL+%26+SPA',

        // Contact details.
        'address' => 'Avenida da República, 2450-000 Nazaré',
        'phone' => '+351 262 000 000',
        'reception_phone' => '+351 262 000 001',
        'email' => 'recepcao@miramar-spa.pt',
        'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Miramar+Hotel+%26+SPA+Nazar%C3%A9',
    ],

    // ---------------------------------------------------------------------
    // Hotel Miramar Sul
    // ---------------------------------------------------------------------
    'miramar-sul' => [
        'slug' => 'miramar-sul',
        'name' => 'Hotel Miramar Sul',
        'location' => 'Nazaré · Miramar Sul',
        'location_short' => 'Nazaré',
        'category' => 'Hotel 4 estrelas',
        'tagline' => 'Sobre a baía da Nazaré, com piscina e terraço',

        'description' => 'Diretório digital do Hotel Miramar Sul, Nazaré: informação útil, Wi-Fi, '
            . 'restaurante, piscina e contactos da receção.',

        'card_image' => asset('images/hotelmiramarsul_card.jpg'),
        'logo' => 'https://placehold.co/320x96/ffffff/b59b5e?text=HOTEL+MIRAMAR+SUL',

        'address' => 'Estrada do Miramar Sul, 2450-000 Nazaré',
        'phone' => '+351 262 000 010',
        'reception_phone' => '+351 262 000 011',
        'email' => 'recepcao@miramar-sul.pt',
        'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Hotel+Miramar+Sul+Nazar%C3%A9',
    ],

];
