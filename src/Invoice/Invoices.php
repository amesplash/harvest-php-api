<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Invoice;

use Amesplash\HarvestApi\Foundation\Collection\ArrayCollection;

final class Invoices extends ArrayCollection
{
    /**
     * Creates a new Invoice Array Collection instance.
     */
    public function __construct(Invoice ...$invoices)
    {
        parent::__construct($invoices);
    }
}
