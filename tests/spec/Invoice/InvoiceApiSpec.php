<?php

declare(strict_types=1);

namespace spec\Amesplash\HarvestApi\Invoice;

use Amesplash\HarvestApi\Foundation\Contract\Collection;
use Amesplash\HarvestApi\Foundation\Contract\HarvestHttp;
use Amesplash\HarvestApi\Invoice\Invoice;
use Amesplash\HarvestApi\Invoice\InvoiceApi;
use Amesplash\HarvestApi\Invoice\Invoices;
use spec\Amesplash\HarvestApi\TestObjectBehavior;
use function count;
use function json_decode;

class InvoiceApiSpec extends TestObjectBehavior
{
    public function let(HarvestHttp $harvestHttp)
    {
        $this->beConstructedWith($harvestHttp);
    }

    public function it_is_initializable() : void
    {
        $this->shouldBeAnInstanceOf(InvoiceApi::class);
    }

    public function it_returns_empty_array_when_no_results_are_returned(
        HarvestHttp $harvestHttp
    ) : void {
        $response = $this->makeExpectedResponse('empty-invoices');
        $jsonData = json_decode($response->getBody()->getContents(), true);
        $totalInvoices = count($jsonData['invoices']);

        $harvestHttp->get('invoices', [])->willReturn($response);
        $harvestHttp->decodeResponseBody($response)->willReturn($jsonData);

        $invoices = $this->fetchAll();
        $invoices->shouldImplement(Collection::class);
        $invoices->shouldBeAnInstanceOf(Invoices::class);

        $invoices->count()->shouldReturn($totalInvoices);
        $invoices->isEmpty()->shouldReturn(true);
    }

    public function it_can_fetch_all_invoices(HarvestHttp $harvestHttp) : void
    {
        $response = $this->makeExpectedResponse('invoices');
        $jsonData = json_decode($response->getBody()->getContents(), true);
        $totalInvoices = count($jsonData['invoices']);

        $harvestHttp->get('invoices', [])->willReturn($response);
        $harvestHttp->decodeResponseBody($response)->willReturn($jsonData);

        $invoices = $this->fetchAll();
        $invoices->shouldImplement(Collection::class);
        $invoices->shouldBeAnInstanceOf(Invoices::class);

        $invoices->count()->shouldReturn($totalInvoices);

        $invoice = $invoices->first();
        $invoice->shouldImplement(Invoice::class);
    }

    public function it_can_fetch_all_invoices_with_given_parameters(
        HarvestHttp $harvestHttp
    ) : void {
        $response = $this->makeExpectedResponse('invoices-client-id-5536436');
        $jsonData = json_decode($response->getBody()->getContents(), true);
        $totalInvoices = count($jsonData['invoices']);

        $parameters = ['client_id' => 5536436];
        $harvestHttp->get('invoices', $parameters)->willReturn($response);
        $harvestHttp->decodeResponseBody($response)->willReturn($jsonData);

        $invoices = $this->fetchAll($parameters);
        $invoices->shouldImplement(Collection::class);
        $invoices->shouldBeAnInstanceOf(Invoices::class);

        $invoices->count()->shouldReturn($totalInvoices);

        $invoice = $invoices->first();
        $invoice->shouldImplement(Invoice::class);
        $invoice->client()->id()->shouldReturn(5536436);
    }

    public function it_can_fetch_an_invoice_by_id(
        HarvestHttp $harvestHttp
    ) : void {
        $response = $this->makeExpectedResponse('invoice-13150453');
        $jsonData = json_decode($response->getBody()->getContents(), true);

        $harvestHttp->get('invoices/13150453')->willReturn($response);
        $harvestHttp->decodeResponseBody($response)->willReturn($jsonData);

        $invoice = $this->fetchById(13150453);
        $invoice->shouldBeAnInstanceOf(Invoice::class);
        $invoice->id()->shouldReturn(13150453);
    }

    public function it_can_create_a_free_form_invoice(
        HarvestHttp $harvestHttp
    ) : void {
        $response = $this->makeExpectedResponse('create-free-form-invoice');
        $jsonData = json_decode($response->getBody()->getContents(), true);
        $firstLineItemId = $jsonData['line_items'][0]['id'];

        $newInvoice = [
            'client_id' => 5735774,
            'subject' => 'ABC Project Quote',
            'due_date' => '2017-07-27',
            'line_items' => [
                'kind' => 'Service',
                'description' => 'ABC Project',
                'unit_price' => 5000.0,
            ],
        ];

        $harvestHttp->post('invoices', $newInvoice)->willReturn($response);
        $harvestHttp->decodeResponseBody($response)->willReturn($jsonData);

        $invoice = $this->newInvoice($newInvoice);
        $invoice->shouldBeAnInstanceOf(Invoice::class);
        $invoice->id()->shouldReturn($jsonData['id']);

        $invoice->lineItems()->first()->id()->shouldReturn($firstLineItemId);
        $invoice->subject()->shouldReturn('ABC Project Quote');
    }

    public function it_can_create_a_time_tracked_invoice(
        HarvestHttp $harvestHttp
    ) : void {
        $response = $this->makeExpectedResponse('create-time-tracked-invoice');
        $jsonData = json_decode($response->getBody()->getContents(), true);
        $firstLineItemId = $jsonData['line_items'][0]['id'];

        $newInvoice = [
            'client_id' => 5735774,
            'subject' => 'ABC Project Quote',
            'payment_term' => 'upon receipt',
            'line_items_import' => [
                'project_ids' => [0 => 14307913],
                'time' => [
                    'summary_type' => 'task',
                    'from' => '2017-03-01',
                    'to' => '2017-03-31',
                ],
                'expenses' => ['summary_type' => 'category'],
            ],
        ];

        $harvestHttp->post('invoices', $newInvoice)->willReturn($response);
        $harvestHttp->decodeResponseBody($response)->willReturn($jsonData);

        $invoice = $this->newTimeTrackedInvoice($newInvoice);
        $invoice->shouldBeAnInstanceOf(Invoice::class);
        $invoice->id()->shouldReturn($jsonData['id']);
        $invoice->lineItems()->first()->id()->shouldReturn($firstLineItemId);
        $invoice->subject()->shouldReturn('ABC Project Quote');
    }

    public function it_can_update_an_invoice(
        HarvestHttp $harvestHttp
    ) : void {
        $url = 'invoices/13150453';
        $response = $this->makeExpectedResponse('invoice-13150453-updated');
        $jsonData = json_decode($response->getBody()->getContents(), true);

        $newInvoiceData = [ 'purchase_order' => 5432];

        $harvestHttp->patch($url, $newInvoiceData)->willReturn($response);
        $harvestHttp->decodeResponseBody($response)->willReturn($jsonData);

        $invoice = $this->update(13150453, $newInvoiceData);
        $invoice->shouldBeAnInstanceOf(Invoice::class);

        $invoice->id()->shouldReturn($jsonData['id']);
        $invoice->purchaseOrder()->shouldReturn($jsonData['purchase_order']);
    }

    public function it_can_update_invoice_line_items(
        HarvestHttp $harvestHttp
    ) : void {
        $url = 'invoices/13150453';
        $response = $this->makeExpectedResponse('invoice-13150453-updated');
        $jsonData = json_decode($response->getBody()->getContents(), true);
        $firstLineItemId = $jsonData['line_items'][0]['id'];

        $lineItem = [
            [
                'id' => 53341928,
                'description' => 'ABC Project Phase 2',
                'unit_price' => 5000.0,
            ],
        ];

        $newInvoiceLineItems = ['line_items' => $lineItem];
        $harvestHttp->patch($url, $newInvoiceLineItems)->willReturn($response);
        $harvestHttp->decodeResponseBody($response)->willReturn($jsonData);

        $invoice = $this->updateLineItems(13150453, $lineItem);
        $invoice->shouldBeAnInstanceOf(Invoice::class);

        $invoice->id()->shouldReturn($jsonData['id']);
        $invoice->lineItems()->first()->unitPrice()->shouldReturn(5000.0);
    }

    public function it_can_delete_invoice_line_items(
        HarvestHttp $harvestHttp
    ) : void {
        $url = 'invoices/13150453';
        $response = $this->makeExpectedResponse('invoice-13150453');
        $jsonData = json_decode($response->getBody()->getContents(), true);
        unset($jsonData['line_items'][0]);

        $lineItems = [
            [
                'id' => 53341928,
                '_destroy' => true,
            ],
        ];

        $newInvoiceLineItems = ['line_items' => $lineItems];
        $harvestHttp->patch($url, $newInvoiceLineItems)->willReturn($response);
        $harvestHttp->decodeResponseBody($response)->willReturn($jsonData);

        unset($lineItems[0]['_destroy']);
        $invoice = $this->deleteLineItems(13150453, $lineItems);
        $invoice->shouldBeAnInstanceOf(Invoice::class);

        $invoice->id()->shouldReturn($jsonData['id']);
        $invoice->lineItems()->count()->shouldReturn(0);
    }

    public function it_can_delete_an_invoice(
        HarvestHttp $harvestHttp
    ) : void {
        $response = $this->makeExpectedResponse('bodyless');
        $harvestHttp->delete('invoices/13150453')->willReturn($response);

        $invoice = $this->delete(13150453);
        $invoice->shouldReturn(true);
    }
}
