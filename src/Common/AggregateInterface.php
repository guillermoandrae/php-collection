<?php

namespace Guillermoandrae\Common;

interface AggregateInterface extends \ArrayAccess, \IteratorAggregate
{
    /**
     * Determines whether or not the item associated with the provided key
     * exists.
     *
     * @param mixed $key  The key associated with the desired item.
     * @return bool
     */
    public function has($key): bool;

    /**
     * Returns the item associated with the provided key. If no item exists,
     * returns the provided default value.
     *
     * @param mixed $key  The key associated with the desired item.
     * @param mixed|null $default  The default value.
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Registers an item using the provided key and value.
     *
     * @param mixed $key  The desired key.
     * @param mixed $value  The desired value.
     * @return mixed
     */
    public function set($key, $value);

    /**
     * Removes the item associated with the provided key and returns the new
     * collection.
     *
     * @param mixed $key  The key associated with the desired item.
     */
    public function remove($key);
}
