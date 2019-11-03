<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Foundation;

use Amesplash\HarvestApi\Foundation\Contract\Entity as EntityContract;
use Amesplash\HarvestApi\Foundation\State\Immutable;

abstract class Entity extends Immutable implements EntityContract
{
}
