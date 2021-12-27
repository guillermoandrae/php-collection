<?php

namespace Guillermoandrae\Common;

interface AggregateInterface extends \ArrayAccess, \IteratorAggregate
{
    /**
     * Determines whether or not the item associated with the provided offset
     * exists.
     *
     * @param mixed $offset  The offset associated with the desired item.
     * @return bool
     */
    public function has(mixed $offset): bool;

    /**
     * Returns the item associated with the provided offset. If no item exists,
     * returns the provided default value.
     *
     * @param mixed $offset  The offset associated with the desired item.
     * @param mixed|null $default  The default value.
     * @return mixed
     */
    public function get(mixed $offset, mixed $default = null): mixed;

    /**
     * Registers an item using the provided offset and value.
     *
     * @param mixed $offset  The desired offset.
     * @param mixed $value  The desired value.
     * @return void
     */
    public function set(mixed $offset, mixed $value): void;

    /**
     * Removes the item associated with the provided offset and returns the new
     * collection.
     *
     * @param mixed $offset  The offset associated with the desired item.
     * @return void
     */
    public function remove(mixed $offset): void;
}
