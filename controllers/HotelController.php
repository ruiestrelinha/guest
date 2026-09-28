<?php

/**
 * Hotel directory controller.
 *
 * Answers the friendly URL of a property - /miramar-spa or /miramar-sul - with
 * its guest directory. The property is read from the model, so an unknown slug
 * ends on the 404 page instead of an empty directory.
 */
class HotelController extends Controller
{
    /**
     * Displays the directory of the requested property.
     *
     * @param string $slug Property slug, taken from the requested route.
     */
    public function show(string $slug = ''): void
    {
        // A slug that is not in the model has no directory to show.
        $hotel = (new Hotel())->findBySlug($slug);

        if ($hotel === null) {
            $this->notFound();

            return;
        }

        $contacts = $this->contactsFor($hotel);

        $this->render('hotel/directory', [
            'page_title' => $hotel['name'],
            'meta_description' => $hotel['description'],
            'hotel' => $hotel,
            'blocks' => (new GuestDirectory())->forHotel($slug),
            'contacts' => $contacts,
            'settings' => $this->settingsSheet($contacts),
        ]);
    }
}
