<?php

/**
 * Content blocks of every property directory, keyed by slug.
 *
 * Every block declares a "type" that decides which partial renders it:
 *
 *   image   - full width photograph behind a dark overlay, for the practical
 *             information the guest needs on arrival and for the sights around
 *             the hotel. Accepts: id, title, icon, intro, image, image_alt, items.
 *   solid   - plain coloured card in one of the house tones, for the services.
 *             Accepts: id, title, icon, tone (sage|taupe), text, details, note.
 *   actions - light card of tappable rows, for the numbers and the shortcuts.
 *             Accepts: id, title, icon, actions (icon, label, value, href).
 *
 * PLACEHOLDER CONTENT - the opening times, amenity lists and Wi-Fi credentials
 * below are examples. Replace them with the information the front desk confirms
 * before the directory goes live.
 */

return [

    // ---------------------------------------------------------------------
    // Miramar Hotel & SPA
    // ---------------------------------------------------------------------
    'miramar-spa' => [

        // Practical information, drawn over a photograph of the hotel.
        [
            'type' => 'image',
            'id' => 'informacao-util',
            'title' => 'Informação Útil',
            'icon' => 'bi-info-circle',
            'image' => 'https://placehold.co/800x533/2f2f2f/b59b5e?text=Miramar+Hotel+%26+SPA',
            'image_alt' => 'Fachada do Miramar Hotel & SPA, na Nazaré',
            'items' => [
                [
                    'icon' => 'bi-box-arrow-in-right',
                    'label' => 'Check-in',
                    'value' => 'A partir das 15:00',
                ],
                [
                    'icon' => 'bi-box-arrow-right',
                    'label' => 'Check-out',
                    'value' => 'Até às 12:00',
                ],
                [
                    'icon' => 'bi-bell',
                    'label' => 'Receção',
                    'value' => 'Aberta 24 horas',
                ],
                [
                    'icon' => 'bi-cup-hot',
                    'label' => 'Pequeno-almoço',
                    'value' => '07:30 – 10:30',
                ],
                [
                    'icon' => 'bi-car-front',
                    'label' => 'Estacionamento',
                    'value' => 'Privado, sujeito a disponibilidade',
                ],
                [
                    'icon' => 'bi-umbrella',
                    'label' => 'Praia',
                    'value' => 'Acesso directo, a 2 minutos a pé',
                ],
            ],
        ],

        // Wi-Fi: a sober card, in the sage tone of the house palette.
        [
            'type' => 'solid',
            'id' => 'wifi',
            'title' => 'Wi-Fi',
            'icon' => 'bi-wifi',
            'tone' => 'sage',
            'text' => 'Acesso gratuito à internet em todo o hotel, quartos e áreas comuns incluídos.',
            'details' => [
                [
                    'label' => 'Rede',
                    'value' => 'MiramarGuest',
                ],
                [
                    'label' => 'Palavra-passe',
                    'value' => 'nazare2026',
                ],
            ],
            'note' => 'Se a ligação falhar, fale com a receção: reiniciamos o acesso por si.',
        ],

        // Restaurant and bar opening times.
        [
            'type' => 'solid',
            'id' => 'restaurante',
            'title' => 'Restaurante & Bar',
            'icon' => 'bi-egg-fried',
            'tone' => 'taupe',
            'text' => 'Cozinha portuguesa de mercado, com vista sobre a baía da Nazaré.',
            'details' => [
                [
                    'label' => 'Pequeno-almoço',
                    'value' => '07:30 – 10:30',
                ],
                [
                    'label' => 'Jantar',
                    'value' => '19:30 – 22:00',
                ],
                [
                    'label' => 'Bar',
                    'value' => '12:00 – 23:00',
                ],
            ],
            'note' => 'Dietas especiais e refeições para crianças a pedido, com 24 horas de antecedência.',
        ],

        // SPA and pool, the reason most guests pick this property.
        [
            'type' => 'solid',
            'id' => 'spa',
            'title' => 'SPA & Piscina',
            'icon' => 'bi-flower1',
            'tone' => 'sage',
            'text' => 'Circuito de água aquecida, sauna, banho turco e sala de massagens.',
            'details' => [
                [
                    'label' => 'SPA',
                    'value' => '10:00 – 20:00',
                ],
                [
                    'label' => 'Piscina interior',
                    'value' => '08:00 – 21:00',
                ],
                [
                    'label' => 'Marcações',
                    'value' => 'Na receção ou pelo telefone',
                ],
            ],
            'note' => 'O acesso à piscina está incluído na estadia. Os tratamentos são marcados à parte.',
        ],

        // What is worth seeing around the hotel.
        [
            'type' => 'image',
            'id' => 'a-descobrir',
            'title' => 'A Descobrir',
            'icon' => 'bi-compass',
            'image' => 'https://placehold.co/800x533/1f1f1f/b59b5e?text=Nazar%C3%A9',
            'image_alt' => 'Vista sobre a baía da Nazaré',
            'intro' => 'Quatro passos a não perder, todos a menos de vinte minutos a pé.',
            'items' => [
                [
                    'icon' => 'bi-binoculars',
                    'label' => 'Farol da Nazaré',
                    'value' => 'Miradouro sobre a Praia do Norte',
                ],
                [
                    'icon' => 'bi-tsunami',
                    'label' => 'Praia do Norte',
                    'value' => 'As ondas grandes, vistas do areal',
                ],
                [
                    'icon' => 'bi-signpost-split',
                    'label' => 'Elevador da Nazaré',
                    'value' => 'Liga a praia ao Sítio, em 2 minutos',
                ],
                [
                    'icon' => 'bi-building',
                    'label' => 'Santuário de Nossa Senhora',
                    'value' => 'No Sítio, com vista para toda a vila',
                ],
            ],
        ],

        // Numbers and shortcuts, as tappable rows.
        [
            'type' => 'actions',
            'id' => 'contactos',
            'title' => 'Contactos & Serviços',
            'icon' => 'bi-telephone',
            'actions' => [
                [
                    'icon' => 'bi-telephone-fill',
                    'label' => 'Receção',
                    'value' => 'Ligar para a receção',
                    'href' => 'tel:+351262000001',
                ],
                [
                    'icon' => 'bi-envelope',
                    'label' => 'E-mail',
                    'value' => 'recepcao@miramar-spa.pt',
                    'href' => 'mailto:recepcao@miramar-spa.pt',
                ],
                [
                    'icon' => 'bi-geo-alt',
                    'label' => 'Como chegar',
                    'value' => 'Avenida da República, Nazaré',
                    'href' => 'https://www.google.com/maps/search/?api=1&query=Miramar+Hotel+%26+SPA+Nazar%C3%A9',
                    'external' => true,
                ],
                [
                    'icon' => 'bi-person-badge',
                    'label' => 'Reservas',
                    'value' => 'Pedidos de estadia e de grupos',
                    'href' => 'mailto:reservas@miramar-spa.pt',
                ],
            ],
        ],

    ],

    // ---------------------------------------------------------------------
    // Hotel Miramar Sul
    // ---------------------------------------------------------------------
    'miramar-sul' => [

        [
            'type' => 'image',
            'id' => 'informacao-util',
            'title' => 'Informação Útil',
            'icon' => 'bi-info-circle',
            'image' => 'https://placehold.co/800x533/2f2f2f/a89f91?text=Hotel+Miramar+Sul',
            'image_alt' => 'Vista sobre a baía a partir do Hotel Miramar Sul',
            'items' => [
                [
                    'icon' => 'bi-box-arrow-in-right',
                    'label' => 'Check-in',
                    'value' => 'A partir das 16:00',
                ],
                [
                    'icon' => 'bi-box-arrow-right',
                    'label' => 'Check-out',
                    'value' => 'Até às 11:00',
                ],
                [
                    'icon' => 'bi-bell',
                    'label' => 'Receção',
                    'value' => 'Aberta 24 horas',
                ],
                [
                    'icon' => 'bi-cup-hot',
                    'label' => 'Pequeno-almoço',
                    'value' => '08:00 – 11:00',
                ],
                [
                    'icon' => 'bi-car-front',
                    'label' => 'Estacionamento',
                    'value' => 'Gratuito, no interior do hotel',
                ],
                [
                    'icon' => 'bi-water',
                    'label' => 'Piscina exterior',
                    'value' => 'Aberta de Junho a Setembro',
                ],
            ],
        ],

        [
            'type' => 'solid',
            'id' => 'wifi',
            'title' => 'Wi-Fi',
            'icon' => 'bi-wifi',
            'tone' => 'sage',
            'text' => 'Acesso gratuito à internet nos quartos e em todas as zonas comuns.',
            'details' => [
                [
                    'label' => 'Rede',
                    'value' => 'MiramarSul',
                ],
                [
                    'label' => 'Palavra-passe',
                    'value' => 'nazare2026',
                ],
            ],
            'note' => 'A rede cobre também o terraço e a zona da piscina.',
        ],

        [
            'type' => 'solid',
            'id' => 'restaurante',
            'title' => 'Restaurante & Bar',
            'icon' => 'bi-egg-fried',
            'tone' => 'taupe',
            'text' => 'Sala panorâmica sobre a baía, com cozinha regional e carta de vinhos.',
            'details' => [
                [
                    'label' => 'Pequeno-almoço',
                    'value' => '08:00 – 11:00',
                ],
                [
                    'label' => 'Jantar',
                    'value' => '19:00 – 21:30',
                ],
                [
                    'label' => 'Bar do terraço',
                    'value' => '16:00 – 00:00',
                ],
            ],
            'note' => 'O bar do terraço encerra em caso de chuva ou vento forte.',
        ],

        [
            'type' => 'solid',
            'id' => 'piscina',
            'title' => 'Piscina & Terraço',
            'icon' => 'bi-sun',
            'tone' => 'sage',
            'text' => 'Piscina exterior com espreguiçadeiras e vista desafogada sobre a Nazaré.',
            'details' => [
                [
                    'label' => 'Horário',
                    'value' => '09:00 – 20:00',
                ],
                [
                    'label' => 'Toalhas',
                    'value' => 'Na receção, com cartão de quarto',
                ],
                [
                    'label' => 'Época',
                    'value' => 'Junho a Setembro',
                ],
            ],
            'note' => 'As crianças devem ser acompanhadas por um adulto.',
        ],

        [
            'type' => 'actions',
            'id' => 'contactos',
            'title' => 'Contactos & Serviços',
            'icon' => 'bi-telephone',
            'actions' => [
                [
                    'icon' => 'bi-telephone-fill',
                    'label' => 'Receção',
                    'value' => 'Ligar para a receção',
                    'href' => 'tel:+351262000011',
                ],
                [
                    'icon' => 'bi-envelope',
                    'label' => 'E-mail',
                    'value' => 'recepcao@miramar-sul.pt',
                    'href' => 'mailto:recepcao@miramar-sul.pt',
                ],
                [
                    'icon' => 'bi-geo-alt',
                    'label' => 'Como chegar',
                    'value' => 'Estrada do Miramar Sul, Nazaré',
                    'href' => 'https://www.google.com/maps/search/?api=1&query=Hotel+Miramar+Sul+Nazar%C3%A9',
                    'external' => true,
                ],
                [
                    'icon' => 'bi-car-front',
                    'label' => 'Transporte',
                    'value' => 'Transfer a pedido, com marcação',
                    'href' => 'mailto:recepcao@miramar-sul.pt',
                ],
            ],
        ],

    ],

];
