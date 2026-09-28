<?php

/**
 * Guest directory model.
 *
 * Holds the content blocks of every property directory, keyed by slug. Each block
 * declares a type - image, solid or actions - which the directory view uses to
 * pick the partial that renders it. Adding a block is therefore a new entry in
 * the data file and nothing else.
 *
 * Note on the name: this model cannot be called "Directory". PHP ships a built-in
 * class with that exact name, which would shadow this file entirely - the
 * autoloader is never reached for a name PHP already knows, and the controller
 * would silently receive an instance of the internal class.
 */
class GuestDirectory extends Model
{
    /**
     * Data file holding the blocks, keyed by property slug.
     *
     * @var string
     */
    protected string $source = 'directory';

    /**
     * Block types the view knows how to render.
     *
     * Anything else is dropped while the blocks are read, so a typo in the data
     * file can never make the view include a partial that does not exist.
     *
     * @var array<int, string>
     */
    private const BLOCK_TYPES = ['image', 'solid', 'actions'];

    /**
     * Blocks of one property, in the order they are displayed.
     *
     * @return array<int, array<string, mixed>>
     */
    public function forHotel(string $slug): array
    {
        $blocks = $this->records[$slug] ?? [];

        if (!is_array($blocks)) {
            return [];
        }

        return array_values(array_filter(
            $blocks,
            static fn($block): bool => is_array($block)
                && in_array($block['type'] ?? '', self::BLOCK_TYPES, true)
        ));
    }

    /**
     * Number of blocks declared for a property.
     *
     * Small helper used by the controller to decide whether a directory has
     * anything to show at all.
     */
    public function countForHotel(string $slug): int
    {
        return count($this->forHotel($slug));
    }
}
