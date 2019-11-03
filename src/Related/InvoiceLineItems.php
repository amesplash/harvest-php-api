<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\Collection\ArrayCollection;

class InvoiceLineItems extends ArrayCollection
{
    /**
     * Creates a new Invoice Line Items instance.
     */
    public function __construct(InvoiceLineItem ...$invoiceLineItem)
    {
        parent::__construct($invoiceLineItem);
    }
}
