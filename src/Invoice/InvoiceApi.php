<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Invoice;

use Amesplash\HarvestApi\Foundation\Contract\HarvestHttp;
use Amesplash\HarvestApi\Related\Client;
use Amesplash\HarvestApi\Related\Creator;
use Amesplash\HarvestApi\Related\Estimate;
use Amesplash\HarvestApi\Related\InvoiceLineItem;
use Amesplash\HarvestApi\Related\InvoiceLineItems;
use Amesplash\HarvestApi\Related\Project;
use DateTimeImmutable;
use DateTimeInterface;
use function array_map;
use function implode;
use function is_string;
use function sprintf;

final class InvoiceApi
{
    /** @var string */
    private $endpoint = 'invoices';

    /** @var HarvestHttp */
    private $harvestHttp;

    public function __construct(HarvestHttp $harvestHttp)
    {
        $this->harvestHttp = $harvestHttp;
    }

    public function fetchAll(array $parameters = []) : Invoices
    {
        $response = $this->harvestHttp->get($this->endpoint, $parameters);
        $data = $this->harvestHttp->decodeResponseBody($response);

        return new Invoices(...array_map(function ($invoice) {
            return $this->makeInvoiceModel($invoice);
        }, $data['invoices']));
    }

    public function fetchById(int $id) : Invoice
    {
        $response = $this->harvestHttp->get($this->makeUri($id));
        $data = $this->harvestHttp->decodeResponseBody($response);

        return $this->makeInvoiceModel($data);
    }

    /**
     * Createa a new free form invoice with given data
     */
    public function newInvoice(array $data) : Invoice
    {
        $response = $this->harvestHttp->post($this->endpoint, $data);
        $data = $this->harvestHttp->decodeResponseBody($response);

        return $this->makeInvoiceModel($data);
    }

    /**
     * Createa a new time tracked invoice with given data
     */
    public function newTimeTrackedInvoice(array $data) : Invoice
    {
        $response = $this->harvestHttp->post($this->endpoint, $data);
        $data = $this->harvestHttp->decodeResponseBody($response);

        return $this->makeInvoiceModel($data);
    }

    public function update(int $id, array $data = []) : Invoice
    {
        $response = $this->harvestHttp->patch($this->makeUri($id), $data);
        $data = $this->harvestHttp->decodeResponseBody($response);

        return $this->makeInvoiceModel($data);
    }

    public function updateLineItems(int $id, array $data) : Invoice
    {
        $data = ['line_items' => $data];
        $response = $this->harvestHttp->patch($this->makeUri($id), $data);
        $data = $this->harvestHttp->decodeResponseBody($response);

        return $this->makeInvoiceModel($data);
    }

    public function deleteLineItems(int $id, array $data) : Invoice
    {
        $preparedLineItems = array_map(static function ($item) {
            $item['_destroy'] = true;

            return $item;
        }, $data);

        $data = ['line_items' => $preparedLineItems];
        $response = $this->harvestHttp->patch($this->makeUri($id), $data);
        $data = $this->harvestHttp->decodeResponseBody($response);

        return $this->makeInvoiceModel($data);
    }

    public function delete(int $id) : bool
    {
        $this->harvestHttp->delete($this->makeUri($id));

        return true;
    }

    /**
     * @param mixed ...$uriParts
     */
    public function makeUri(...$uriParts) : string
    {
        return sprintf('%s/%s', $this->endpoint, implode('/', $uriParts));
    }

    private function makeInvoiceModel(array $data) : Invoice
    {
        $dateElements = [
            'date',
            'period_start',
            'period_end',
            'issue_date',
            'due_date',
            'paid_date',
        ];

        $dateTimeElements = [
            'date',
            'datetime',
            'period_start',
            'period_end',
            'issue_date',
            'due_date',
            'sent_at',
            'paid_at',
            'closed_at',
            'created_at',
            'updated_at',
        ];

        foreach ($dateElements as $dateElement) {
            if (isset($data[$dateElement])) {
                $data[$dateElement] =  is_string($data[$dateElement])
                ? DateTimeImmutable::createFromFormat(
                    'Y-m-d',
                    $data[$dateElement]
                )
                : null;
            }
        }

        foreach ($dateTimeElements as $dateTimeElement) {
            if (isset($data[$dateTimeElement])) {
                $data[$dateTimeElement] =  is_string($data[$dateTimeElement])
                ? DateTimeImmutable::createFromFormat(
                    DateTimeInterface::ISO8601,
                    (string) $data[$dateTimeElement]
                )
                : null;
            }
        }

        if (isset($data['client'])) {
            $data['client'] = Client::makeFromArray((array) $data['client']);
        }

        if (isset($data['estimate'])) {
            $data['estimate'] = Estimate::makeFromArray($data['estimate']);
        }

        if (isset($data['creator'])) {
            $data['creator'] = Creator::makeFromArray($data['creator']);
        }

        if (isset($data['line_items'])) {
            $lineItems = array_map(static function ($lineItem) {
                if (isset($lineItem['project'])) {
                    $lineItem['project'] = Project::makeFromArray(
                        $lineItem['project']
                    );
                }

                return InvoiceLineItem::makeFromArray($lineItem);
            }, $data['line_items']);

            $data['line_items'] = new InvoiceLineItems(...$lineItems);
        }

        return Invoice::makeFromArray($data);
    }
}
