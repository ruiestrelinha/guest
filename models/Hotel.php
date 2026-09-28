<?php

/**
 * Hotel model.
 *
 * Holds the properties of the group - the hotels the guest can choose from - as
 * they appear on the selection page and in the header of each directory.
 */
class Hotel extends Model
{
    /**
     * Data file holding the properties of the group.
     *
     * @var string
     */
    protected string $source = 'hotels';

    /**
     * Every property, as a list, in the order the data file defines.
     *
     * The base model keeps the records keyed by slug, which is convenient for
     * lookups; the selection page needs a plain list to loop over.
     *
     * @return array<int, array<string, mixed>>
     */
    public function all(): array
    {
        return array_values($this->records);
    }

    /**
     * The property answering to the given slug, or null when there is none.
     *
     * A null answer is what tells the hotel controller to show the 404 page, so
     * an address such as /hotel-que-nao-existe never renders an empty directory.
     *
     * @return array<string, mixed>|null
     */
    public function findBySlug(string $slug): ?array
    {
        return $this->find('slug', $slug);
    }

    /**
     * Slugs of every property.
     *
     * The front controller uses these to publish one friendly URL per hotel, so
     * the data file is the single place where a new property is declared.
     *
     * @return array<int, string>
     */
    public function slugs(): array
    {
        return $this->pluck('slug');
    }
}
