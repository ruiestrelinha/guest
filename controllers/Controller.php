<?php

/**
 * Base controller.
 *
 * Gives every controller the two things it needs: rendering a view inside the
 * shared layout, and sending the guest to another route. Controllers never print
 * HTML themselves - the markup lives in /views.
 */
abstract class Controller
{
    /**
     * Renders a view inside the application layout.
     *
     * The data array is extracted into the local scope, so a view receives its
     * variables by name and the layout receives the same ones. That is how the
     * header knows which title to print and the bottom bar which number to dial.
     *
     * @param string               $view       View path relative to /views, without the extension.
     * @param array<string, mixed> $data       Variables handed over to the view.
     * @param bool                 $withLayout Whether to wrap the view in the shared layout.
     */
    protected function render(string $view, array $data = [], bool $withLayout = true): void
    {
        // Anything the view needs is available as a variable of the same name.
        extract($data, EXTR_SKIP);

        if ($withLayout) {
            require view_path('layouts/header');
        }

        require view_path($view);

        if ($withLayout) {
            require view_path('layouts/footer');
        }
    }

    /**
     * Sends the guest to another route and stops the request.
     */
    protected function redirect(string $route): void
    {
        header('Location: ' . url($route), true, 302);
        exit;
    }

    /**
     * Answers with the 404 page and the matching HTTP status.
     *
     * The status matters as much as the page: it is what keeps a mistyped or
     * removed address out of the search results.
     */
    protected function notFound(): void
    {
        http_response_code(404);

        $this->render('errors/404', [
            'page_title' => 'Página não encontrada',
            'contacts' => $this->contactsFor(null),
        ]);
    }

    /**
     * Contact details of the page being rendered.
     *
     * The bottom bar and the settings sheet always offer the same shortcuts.
     * They point at the property in context when the guest is inside a directory,
     * and at the group otherwise, so the bar keeps working on the selection page
     * where no single hotel has been chosen yet.
     *
     * @param array<string, mixed>|null $hotel Property in context, when there is one.
     *
     * @return array<string, mixed>
     */
    protected function contactsFor(?array $hotel): array
    {
        // Group details double as the fallback for every field the property in
        // context does not define.
        $group = new Contact();

        if ($hotel !== null) {
            return [
                'label' => $hotel['name'],
                'phone' => $hotel['phone'],
                'reception' => $hotel['reception_phone'],
                'email' => $hotel['email'],
                'address' => $hotel['address'],
                'maps' => $hotel['maps_url'],
            ];
        }

        return [
            'label' => APP_NAME,
            'phone' => $group->phone(),
            'reception' => $group->reception(),
            'email' => '',
            'address' => '',
            'maps' => $group->maps(),
        ];
    }

    /**
     * Contents of the settings sheet.
     *
     * Built here rather than in the view because deciding which numbers are worth
     * showing - the ones of the property in context, or the group ones - is a
     * decision about the guest's situation, not about the markup.
     *
     * @param array<string, mixed> $contacts Result of contactsFor().
     *
     * @return array<string, mixed>
     */
    protected function settingsSheet(array $contacts): array
    {
        $group = new Contact();

        return [
            'title' => 'Definições',
            'subtitle' => $contacts['label'],
            'links' => [
                [
                    'icon' => 'bi-telephone-fill',
                    'label' => 'Telefone',
                    'value' => $contacts['phone'],
                    'href' => tel_link((string) $contacts['phone']),
                ],
                [
                    'icon' => 'bi-bell',
                    'label' => 'Receção',
                    'value' => $contacts['reception'],
                    'href' => tel_link((string) $contacts['reception']),
                ],
                [
                    'icon' => 'bi-geo-alt',
                    'label' => 'Localização',
                    'value' => $contacts['address'] !== '' ? $contacts['address'] : 'Abrir no mapa',
                    'href' => $contacts['maps'],
                    'external' => true,
                ],
            ],
            'emergency' => $group->emergency(),
            'about' => $group->about(),
        ];
    }
}
