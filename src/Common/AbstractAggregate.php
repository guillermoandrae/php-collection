<?php

namespace Guillermoandrae\Common;

use ArrayIterator;
use JetBrains\PhpStorm\Pure;

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
    final public function has($offset): bool
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
    public function remove($offset): void
    {
        $this->offsetUnset($offset);
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->items);
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetGet($offset): mixed
    {
        return $this->items[$offset];
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetSet($offset, $value): void
    {
        $this->items[$offset] = $value;
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetUnset($offset): void
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
