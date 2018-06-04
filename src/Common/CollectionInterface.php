<?php

namespace Guillermoandrae\Common;

interface CollectionInterface extends AggregateInterface, ArrayableInterface, JsonableInterface
{
    /**
     * Returns a new collection built using the provided items.
     *
     * @param array $items The collection items.
     * @return static
     */
    public static function make(array $items = []): CollectionInterface;

    /**
     * Returns all items in the collection.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Returns the first item in the collection.
     *
     * @return mixed
     */
    public function first();

    /**
     * Returns the last item in the collection.
     *
     * @return mixed
     */
    public function last();

    /**
     * Returns a random item from the collection.
     *
     * @return mixed
     */
    public function random();

    /**
     * Returns the number of items in the collection.
     *
     * @return int
     */
    public function count(): int;

    /**
     * Determines whether or not the collection is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Returns a collection of shuffled items.
     *
     * @return CollectionInterface
     */
    public function shuffle(): CollectionInterface;

    /**
     * Returns a collection that includes items within the desired offset and
     * limit.
     *
     * @param int $offset The offset.
     * @param int|null $limit The limit.
     * @return CollectionInterface
     */
    public function limit(int $offset = 0, int $limit = null): CollectionInterface;

    /**
     * Returns a collection sorted by the provided field name.
     *
     * @param string $fieldName  The field name to use when grouping results.
     * @return CollectionInterface
     */
    public function sortBy(string $fieldName): CollectionInterface;

    /**
     * Returns a collection filtered by the provided callback.
     *
     * @param callable $callback  The callback to use when filtering.
     * @return CollectionInterface
     */
    public function filter(callable $callback): CollectionInterface;

    /**
     * Returns a collection wherein the provided callback has been applied to
     * all items.
     *
     * @param callable $callback  The callback to apply to all items.
     * @return CollectionInterface
     */
    public function map(callable $callback): CollectionInterface;
}
