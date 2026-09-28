<?php

/**
 * Base model.
 *
 * Every model reads its records from a PHP file kept in /models/data, which
 * returns a plain array. That is enough for a guest directory and lets the hotel
 * staff edit the content without touching the code or a database. Because the
 * controllers only ever use the accessors below, moving the content into a
 * database later means rewriting this class alone.
 */
abstract class Model
{
    /**
     * Records loaded from the data file.
     *
     * @var array<int|string, array<string, mixed>>
     */
    protected array $records = [];

    /**
     * Name of the data file, without the .php extension.
     *
     * Each model states which file it reads; the base class only knows how to
     * load it.
     *
     * @var string
     */
    protected string $source = '';

    public function __construct()
    {
        $file = ROOT_PATH . '/models/data/' . $this->source . '.php';

        // A model without a source, or with a source that has not been created
        // yet, simply stays empty instead of breaking the page.
        if ($this->source === '' || !is_file($file)) {
            return;
        }

        $records = require $file;

        $this->records = is_array($records) ? $records : [];
    }

    /**
     * Every record of the model, in the order defined in the data file.
     *
     * @return array<int|string, array<string, mixed>>
     */
    public function all(): array
    {
        return $this->records;
    }

    /**
     * First record whose field matches the given value.
     *
     * @return array<string, mixed>|null Null when nothing matches.
     */
    public function find(string $field, $value): ?array
    {
        foreach ($this->records as $record) {
            if (is_array($record) && ($record[$field] ?? null) === $value) {
                return $record;
            }
        }

        return null;
    }

    /**
     * Values of a single field, taken across every record.
     *
     * @return array<int, mixed>
     */
    public function pluck(string $field): array
    {
        $values = [];

        foreach ($this->records as $record) {
            if (is_array($record) && isset($record[$field])) {
                $values[] = $record[$field];
            }
        }

        return $values;
    }
}
