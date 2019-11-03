<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\Collection\ArrayCollection;

class EstimateLineItems extends ArrayCollection
{
    /**
     * Creates a new Estimate Line Items instance.
     */
    public function __construct(EstimateLineItem ...$estimateLineItem)
    {
        parent::__construct($estimateLineItem);
    }
}
