<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi;

use Amesplash\HarvestApi\Client\ClientApi;
use Amesplash\HarvestApi\Foundation\Contract\HarvestHttp;
use Amesplash\HarvestApi\Invoice\InvoiceApi;

final class Harvest
{
    /** @var HarvestHttp */
    private $http;

    /** @var ClientApi */
    private $clientApi;

    /** @var InvoiceApi */
    private $invoiceApi;

    /**
     * Create new Client instance
     */
    public function __construct(HarvestHttp $http)
    {
        $this->http = $http;
    }

    public function clients() : ClientApi
    {
        if (! $this->clientApi instanceof ClientApi) {
            $this->clientApi = new ClientApi($this->http);
        }

        return $this->clientApi;
    }

    public function invoices() : InvoiceApi
    {
        if (! $this->invoiceApi instanceof InvoiceApi) {
            $this->invoiceApi = new InvoiceApi($this->http);
        }

        return $this->invoiceApi;
    }
}
