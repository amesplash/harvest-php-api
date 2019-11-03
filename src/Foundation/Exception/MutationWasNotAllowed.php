<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Foundation\Exception;

use function get_class;
use function sprintf;

class MutationWasNotAllowed extends Exception
{
    /**
     * @param mixed $object
     */
    public static function forObject($object) : self
    {
        return new self(sprintf('%s is immutable.', get_class($object)));
    }
}
