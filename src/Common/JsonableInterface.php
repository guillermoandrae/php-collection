<?php

namespace Guillermoandrae\Common;

interface JsonableInterface
{
    /**
     * Returns the object as a JSON string.
     *
     * @return string
     */
    public function toJson(): string;
}
