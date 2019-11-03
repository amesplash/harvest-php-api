<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Client;

use Amesplash\HarvestApi\Foundation\Contract\HarvestHttp;

final class ClientApi
{
    /** @var string */
    private $endpoint = 'clients';

    /** @var HarvestHttp */
    private $harvestHttp;

    public function __construct(HarvestHttp $harvestHttp)
    {
        $this->harvestHttp = $harvestHttp;
    }
}
