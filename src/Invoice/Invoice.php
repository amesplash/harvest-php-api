<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Invoice;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\Client;
use Amesplash\HarvestApi\Related\Creator;
use Amesplash\HarvestApi\Related\Estimate;
use Amesplash\HarvestApi\Related\InvoiceLineItems;
use Amesplash\HarvestApi\Related\Retainer;
use DateTimeInterface;

final class Invoice extends Entity
{
    /**
     * Unique ID for the invoice.
     *
     * @var ?int
     */
    private $id;

    /**
     * An object containing invoice’s client id and name.
     *
     * @var ?Client
     */
    private $client;

    /**
     * Array of invoice line items.
     *
     * @var ?InvoiceLineItems
     */
    private $lineItems;

    /**
     * An object containing the associated estimate’s id.
     *
     * @var ?Estimate
     */
    private $estimate;

    /**
     * An object containing the associated retainer’s id.
     *
     * @var ?Retainer
     */
    private $retainer;

    /**
     * An object containing the id and name of the person that created the invoice.
     *
     * @var ?Creator
     */
    private $creator;

    /**
     * Used to build a URL to the public web invoice for your client:https://{ACCOUNTSUBDOMAIN}.harvestapp.com/client/invoices/abc123456
     *
     * @var ?string
     */
    private $clientKey;

    /**
     * If no value is set, the number will be automatically generated.
     *
     * @var ?string
     */
    private $number;

    /**
     * The purchase order number.
     *
     * @var ?string
     */
    private $purchaseOrder;

    /**
     * The total amount for the invoice, including any discounts and taxes.
     *
     * @var ?float
     */
    private $amount;

    /**
     * The total amount due at this time for this invoice.
     *
     * @var ?float
     */
    private $dueAmount;

    /**
     * This percentage is applied to the subtotal, including line items and discounts.
     *
     * @var ?float
     */
    private $tax;

    /**
     * The first amount of tax included, calculated from tax. If no tax is defined, this value will be null.
     *
     * @var ?float
     */
    private $taxAmount;

    /**
     * This percentage is applied to the subtotal, including line items and discounts.
     *
     * @var ?float
     */
    private $tax2;

    /**
     * The amount calculated from tax2.
     *
     * @var ?float
     */
    private $tax2Amount;

    /**
     * This percentage is subtracted from the subtotal.
     *
     * @var ?float
     */
    private $discount;

    /**
     * The amount calcuated from discount.
     *
     * @var ?float
     */
    private $discountAmount;

    /**
     * The invoice subject.
     *
     * @var ?string
     */
    private $subject;

    /**
     * Any additional notes included on the invoice.
     *
     * @var ?string
     */
    private $notes;

    /**
     * The currency code associated with this invoice.
     *
     * @var ?string
     */
    private $currency;

    /**
     * The current state of the invoice: draft, open, paid, or closed.
     *
     * @var ?string
     */
    private $state;

    /**
     * Start of the period during which time entries were added to this invoice.
     *
     * @var ?DateTimeInterface
     */
    private $periodStart;

    /**
     * End of the period during which time entries were added to this invoice.
     *
     * @var ?DateTimeInterface
     */
    private $periodEnd;

    /**
     * Date the invoice was issued.
     *
     * @var ?DateTimeInterface
     */
    private $issueDate;

    /**
     * Date the invoice is due.
     *
     * @var ?DateTimeInterface
     */
    private $dueDate;

    /**
     * The timeframe in which the invoice should be paid. Options: upon receipt, net 15, net 30, net 45, net 60, or custom.
     *
     * @var ?string
     */
    private $paymentTerm;

    /**
     * Date and time the invoice was sent.
     *
     * @var ?DateTimeInterface
     */
    private $sentAt;

    /**
     * Date and time the invoice was paid.
     *
     * @var ?DateTimeInterface
     */
    private $paidAt;

    /**
     * Date the invoice was paid.
     *
     * @var ?DateTimeInterface
     */
    private $paidDate;

    /**
     * Date and time the invoice was closed.
     *
     * @var ?DateTimeInterface
     */
    private $closedAt;

    /**
     * Date and time the invoice was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the invoice was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Invoice instance.
     */
    public function __construct(
        ?int $id = null,
        ?Client $client = null,
        ?InvoiceLineItems $lineItems = null,
        ?Estimate $estimate = null,
        ?Retainer $retainer = null,
        ?Creator $creator = null,
        ?string $clientKey = null,
        ?string $number = null,
        ?string $purchaseOrder = null,
        ?float $amount = null,
        ?float $dueAmount = null,
        ?float $tax = null,
        ?float $taxAmount = null,
        ?float $tax2 = null,
        ?float $tax2Amount = null,
        ?float $discount = null,
        ?float $discountAmount = null,
        ?string $subject = null,
        ?string $notes = null,
        ?string $currency = null,
        ?string $state = null,
        ?DateTimeInterface $periodStart = null,
        ?DateTimeInterface $periodEnd = null,
        ?DateTimeInterface $issueDate = null,
        ?DateTimeInterface $dueDate = null,
        ?string $paymentTerm = null,
        ?DateTimeInterface $sentAt = null,
        ?DateTimeInterface $paidAt = null,
        ?DateTimeInterface $paidDate = null,
        ?DateTimeInterface $closedAt = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->client = $client;
        $this->lineItems = $lineItems;
        $this->estimate = $estimate;
        $this->retainer = $retainer;
        $this->creator = $creator;
        $this->clientKey = $clientKey;
        $this->number = $number;
        $this->purchaseOrder = $purchaseOrder;
        $this->amount = $amount;
        $this->dueAmount = $dueAmount;
        $this->tax = $tax;
        $this->taxAmount = $taxAmount;
        $this->tax2 = $tax2;
        $this->tax2Amount = $tax2Amount;
        $this->discount = $discount;
        $this->discountAmount = $discountAmount;
        $this->subject = $subject;
        $this->notes = $notes;
        $this->currency = $currency;
        $this->state = $state;
        $this->periodStart = $periodStart;
        $this->periodEnd = $periodEnd;
        $this->issueDate = $issueDate;
        $this->dueDate = $dueDate;
        $this->paymentTerm = $paymentTerm;
        $this->sentAt = $sentAt;
        $this->paidAt = $paidAt;
        $this->paidDate = $paidDate;
        $this->closedAt = $closedAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function client() : ?Client
    {
        return $this->client;
    }

    public function lineItems() : ?InvoiceLineItems
    {
        return $this->lineItems;
    }

    public function estimate() : ?Estimate
    {
        return $this->estimate;
    }

    public function retainer() : ?Retainer
    {
        return $this->retainer;
    }

    public function creator() : ?Creator
    {
        return $this->creator;
    }

    public function clientKey() : ?string
    {
        return $this->clientKey;
    }

    public function number() : ?string
    {
        return $this->number;
    }

    public function purchaseOrder() : ?string
    {
        return $this->purchaseOrder;
    }

    public function amount() : ?float
    {
        return $this->amount;
    }

    public function dueAmount() : ?float
    {
        return $this->dueAmount;
    }

    public function tax() : ?float
    {
        return $this->tax;
    }

    public function taxAmount() : ?float
    {
        return $this->taxAmount;
    }

    public function tax2() : ?float
    {
        return $this->tax2;
    }

    public function tax2Amount() : ?float
    {
        return $this->tax2Amount;
    }

    public function discount() : ?float
    {
        return $this->discount;
    }

    public function discountAmount() : ?float
    {
        return $this->discountAmount;
    }

    public function subject() : ?string
    {
        return $this->subject;
    }

    public function notes() : ?string
    {
        return $this->notes;
    }

    public function currency() : ?string
    {
        return $this->currency;
    }

    public function state() : ?string
    {
        return $this->state;
    }

    public function periodStart() : ?DateTimeInterface
    {
        return $this->periodStart;
    }

    public function periodEnd() : ?DateTimeInterface
    {
        return $this->periodEnd;
    }

    public function issueDate() : ?DateTimeInterface
    {
        return $this->issueDate;
    }

    public function dueDate() : ?DateTimeInterface
    {
        return $this->dueDate;
    }

    public function paymentTerm() : ?string
    {
        return $this->paymentTerm;
    }

    public function sentAt() : ?DateTimeInterface
    {
        return $this->sentAt;
    }

    public function paidAt() : ?DateTimeInterface
    {
        return $this->paidAt;
    }

    public function paidDate() : ?DateTimeInterface
    {
        return $this->paidDate;
    }

    public function closedAt() : ?DateTimeInterface
    {
        return $this->closedAt;
    }

    public function createdAt() : ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function updatedAt() : ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function arrayCopy() : array
    {
        return [
            'id' => $this->id,
            'client' => $this->client,
            'line_items' => $this->lineItems,
            'estimate' => $this->estimate,
            'retainer' => $this->retainer,
            'creator' => $this->creator,
            'client_key' => $this->clientKey,
            'number' => $this->number,
            'purchase_order' => $this->purchaseOrder,
            'amount' => $this->amount,
            'due_amount' => $this->dueAmount,
            'tax' => $this->tax,
            'tax_amount' => $this->taxAmount,
            'tax2' => $this->tax2,
            'tax2_amount' => $this->tax2Amount,
            'discount' => $this->discount,
            'discount_amount' => $this->discountAmount,
            'subject' => $this->subject,
            'notes' => $this->notes,
            'currency' => $this->currency,
            'state' => $this->state,
            'period_start' => $this->periodStart,
            'period_end' => $this->periodEnd,
            'issue_date' => $this->issueDate,
            'due_date' => $this->dueDate,
            'payment_term' => $this->paymentTerm,
            'sent_at' => $this->sentAt,
            'paid_at' => $this->paidAt,
            'paid_date' => $this->paidDate,
            'closed_at' => $this->closedAt,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['client'],
            $data['line_items'],
            $data['estimate'],
            $data['retainer'],
            $data['creator'],
            $data['client_key'],
            $data['number'],
            $data['purchase_order'],
            $data['amount'],
            $data['due_amount'],
            $data['tax'],
            $data['tax_amount'],
            $data['tax2'],
            $data['tax2_amount'],
            $data['discount'],
            $data['discount_amount'],
            $data['subject'],
            $data['notes'],
            $data['currency'],
            $data['state'],
            $data['period_start'],
            $data['period_end'],
            $data['issue_date'],
            $data['due_date'],
            $data['payment_term'],
            $data['sent_at'],
            $data['paid_at'],
            $data['paid_date'],
            $data['closed_at'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
