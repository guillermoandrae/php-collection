<?php

namespace Guillermoandrae\Common;

use ArrayIterator;

abstract class AbstractAggregate implements AggregateInterface
{
    use DumpableTrait;

    /**
     * The items used to build the object.
     *
     * @var array
     */
    protected array $items;

    /**
     * Builds the Collection object.
     *
     * @param array $items  The array of items used to build the aggregate.
     */
    final public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * {@inheritDoc}
     */
    final public function has(mixed $offset): bool
    {
        return $this->offsetExists($offset);
    }

    /**
     * {@inheritDoc}
     */
    final public function get(mixed $offset, mixed $default = null): mixed
    {
        if ($this->offsetExists($offset)) {
            return $this->items[$offset];
        }
        return $default;
    }

     /**
     * {@inheritDoc}
     */
    final public function set(mixed $offset, mixed $value): void
    {
        $this->offsetSet($offset, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function remove(mixed $offset): void
    {
        $this->offsetUnset($offset);
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->items);
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset];
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->items[$offset] = $value;
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
    }

    /**
     * {@inheritDoc}
     */
    final public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}
