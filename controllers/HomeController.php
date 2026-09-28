<?php

/**
 * Property selection controller.
 *
 * Landing page of the guest directory. It lists the properties of the group and
 * lets the guest open the directory of the hotel they are staying in.
 */
class HomeController extends Controller
{
    /**
     * Displays the property selection page.
     */
    public function index(): void
    {
        // The properties come from the model; the view only lays them out.
        $hotels = (new Hotel())->all();

        $contacts = $this->contactsFor(null);

        $this->render('home/selection', [
            'page_title' => 'Selecionar Hotel',
            'meta_description' => 'Escolha o hotel onde está hospedado para abrir o diretório digital '
                . 'com toda a informação da sua estadia: ' . APP_NAME . '.',
            'hotels' => $hotels,
            'logo' => (new Contact())->logo(),
            'contacts' => $contacts,
            'settings' => $this->settingsSheet($contacts),
        ]);
    }
}
