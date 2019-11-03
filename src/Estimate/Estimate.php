<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Estimate;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\Client;
use Amesplash\HarvestApi\Related\Creator;
use Amesplash\HarvestApi\Related\EstimateLineItems;
use DateTimeInterface;

final class Estimate extends Entity
{
    /**
     * Unique ID for the estimate.
     *
     * @var ?int
     */
    private $id;

    /**
     * An object containing estimate’s client id and name.
     *
     * @var ?Client
     */
    private $client;

    /**
     * Array of estimate line items.
     *
     * @var ?EstimateLineItems
     */
    private $lineItems;

    /**
     * An object containing the id and name of the person that created the estimate.
     *
     * @var ?Creator
     */
    private $creator;

    /**
     * Used to build a URL to the public web invoice for your client:https://{ACCOUNTSUBDOMAIN}.harvestapp.com/client/estimates/abc123456
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
     * The total amount for the estimate, including any discounts and taxes.
     *
     * @var ?float
     */
    private $amount;

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
     * The estimate subject.
     *
     * @var ?string
     */
    private $subject;

    /**
     * Any additional notes included on the estimate.
     *
     * @var ?string
     */
    private $notes;

    /**
     * The currency code associated with this estimate.
     *
     * @var ?string
     */
    private $currency;

    /**
     * The current state of the estimate: draft, sent, accepted, or declined.
     *
     * @var ?string
     */
    private $state;

    /**
     * Date the estimate was issued.
     *
     * @var ?DateTimeInterface
     */
    private $issueDate;

    /**
     * Date and time the estimate was sent.
     *
     * @var ?DateTimeInterface
     */
    private $sentAt;

    /**
     * Date and time the estimate was accepted.
     *
     * @var ?DateTimeInterface
     */
    private $acceptedAt;

    /**
     * Date and time the estimate was declined.
     *
     * @var ?DateTimeInterface
     */
    private $declinedAt;

    /**
     * Date and time the estimate was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the estimate was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Estimate instance.
     */
    public function __construct(
        ?int $id = null,
        ?Client $client = null,
        ?EstimateLineItems $lineItems = null,
        ?Creator $creator = null,
        ?string $clientKey = null,
        ?string $number = null,
        ?string $purchaseOrder = null,
        ?float $amount = null,
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
        ?DateTimeInterface $issueDate = null,
        ?DateTimeInterface $sentAt = null,
        ?DateTimeInterface $acceptedAt = null,
        ?DateTimeInterface $declinedAt = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->client = $client;
        $this->lineItems = $lineItems;
        $this->creator = $creator;
        $this->clientKey = $clientKey;
        $this->number = $number;
        $this->purchaseOrder = $purchaseOrder;
        $this->amount = $amount;
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
        $this->issueDate = $issueDate;
        $this->sentAt = $sentAt;
        $this->acceptedAt = $acceptedAt;
        $this->declinedAt = $declinedAt;
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

    public function lineItems() : ?EstimateLineItems
    {
        return $this->lineItems;
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

    public function issueDate() : ?DateTimeInterface
    {
        return $this->issueDate;
    }

    public function sentAt() : ?DateTimeInterface
    {
        return $this->sentAt;
    }

    public function acceptedAt() : ?DateTimeInterface
    {
        return $this->acceptedAt;
    }

    public function declinedAt() : ?DateTimeInterface
    {
        return $this->declinedAt;
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
            'creator' => $this->creator,
            'client_key' => $this->clientKey,
            'number' => $this->number,
            'purchase_order' => $this->purchaseOrder,
            'amount' => $this->amount,
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
            'issue_date' => $this->issueDate,
            'sent_at' => $this->sentAt,
            'accepted_at' => $this->acceptedAt,
            'declined_at' => $this->declinedAt,
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
            $data['creator'],
            $data['client_key'],
            $data['number'],
            $data['purchase_order'],
            $data['amount'],
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
            $data['issue_date'],
            $data['sent_at'],
            $data['accepted_at'],
            $data['declined_at'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
