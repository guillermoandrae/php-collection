<?php

namespace Guillermoandrae\Common;

trait JsonableTrait
{
    /**
     * Returns the object as a string.
     *
     * @return string
     */
    final public function __toString()
    {
        return $this->toJson();
    }

    /**
     * Returns the object as a JSON string.
     *
     * @return string
     */
    abstract public function toJson(): string;
}
