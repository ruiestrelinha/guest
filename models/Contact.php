<?php

/**
 * Contact model.
 *
 * Holds the group-wide details: the central line, the emergency numbers and the
 * legal links printed in the footer. They are kept apart from the properties
 * because they do not belong to a single hotel - the selection page shows them
 * before the guest has chosen where they are staying.
 *
 * The data file returns one record rather than a list, so this model reads it
 * directly instead of searching through it.
 */
class Contact extends Model
{
    /**
     * Data file holding the group details.
     *
     * @var string
     */
    protected string $source = 'contacts';

    /**
     * Logo of the group, shown on the selection page.
     */
    public function logo(): string
    {
        return (string) ($this->records['logo'] ?? '');
    }

    /**
     * Group telephone number, used when no single property is in context.
     */
    public function phone(): string
    {
        return (string) ($this->records['phone'] ?? '');
    }

    /**
     * Group reception number, used when no single property is in context.
     */
    public function reception(): string
    {
        return (string) ($this->records['reception'] ?? '');
    }

    /**
     * Address the maps shortcut of the selection page opens.
     */
    public function maps(): string
    {
        return (string) ($this->records['maps'] ?? '');
    }

    /**
     * Text of the "about" section of the settings sheet.
     */
    public function about(): string
    {
        return (string) ($this->records['about'] ?? '');
    }

    /**
     * Emergency numbers, listed in the settings sheet.
     *
     * @return array<int, array<string, string>>
     */
    public function emergency(): array
    {
        $numbers = $this->records['emergency'] ?? [];

        return is_array($numbers) ? $numbers : [];
    }
}
