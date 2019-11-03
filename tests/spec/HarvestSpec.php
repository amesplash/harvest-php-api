<?php

declare(strict_types=1);

namespace spec\Amesplash\HarvestApi;

use Amesplash\HarvestApi\Foundation\Contract\HarvestHttp;
use Amesplash\HarvestApi\Harvest;
use Amesplash\HarvestApi\Invoice\InvoiceApi;
use PhpSpec\ObjectBehavior;

class HarvestSpec extends ObjectBehavior
{
    public function let(HarvestHttp $harvestHttp)
    {
        $this->beConstructedWith($harvestHttp);
    }

    public function it_is_initializable() : void
    {
        $this->shouldBeAnInstanceOf(Harvest::class);
    }

    public function it_returns_the_invoice_api_instance()
    {
        $this->invoices()->shouldReturnAnInstanceOf(InvoiceApi::class);
    }
}
