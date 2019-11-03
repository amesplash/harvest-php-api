<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Invoice;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\PaymentGateway;
use DateTimeInterface;

final class Payment extends Entity
{
    /**
     * Unique ID for the payment.
     *
     * @var ?int
     */
    private $id;

    /**
     * The amount of the payment.
     *
     * @var ?float
     */
    private $amount;

    /**
     * Date and time the payment was made.
     *
     * @var ?DateTimeInterface
     */
    private $paidAt;

    /**
     * Date the payment was made.
     *
     * @var ?DateTimeInterface
     */
    private $paidDate;

    /**
     * The name of the person who recorded the payment.
     *
     * @var ?string
     */
    private $recordedBy;

    /**
     * The email of the person who recorded the payment.
     *
     * @var ?string
     */
    private $recordedByEmail;

    /**
     * Any notes associated with the payment.
     *
     * @var ?string
     */
    private $notes;

    /**
     * Either the card authorization or PayPal transaction ID.
     *
     * @var ?string
     */
    private $transactionId;

    /**
     * The payment gateway id and name used to process the payment.
     *
     * @var ?PaymentGateway
     */
    private $paymentGateway;

    /**
     * Date and time the payment was recorded.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the payment was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Invoice Payment instance.
     */
    public function __construct(
        ?int $id = null,
        ?float $amount = null,
        ?DateTimeInterface $paidAt = null,
        ?DateTimeInterface $paidDate = null,
        ?string $recordedBy = null,
        ?string $recordedByEmail = null,
        ?string $notes = null,
        ?string $transactionId = null,
        ?PaymentGateway $paymentGateway = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->amount = $amount;
        $this->paidAt = $paidAt;
        $this->paidDate = $paidDate;
        $this->recordedBy = $recordedBy;
        $this->recordedByEmail = $recordedByEmail;
        $this->notes = $notes;
        $this->transactionId = $transactionId;
        $this->paymentGateway = $paymentGateway;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function amount() : ?float
    {
        return $this->amount;
    }

    public function paidAt() : ?DateTimeInterface
    {
        return $this->paidAt;
    }

    public function paidDate() : ?DateTimeInterface
    {
        return $this->paidDate;
    }

    public function recordedBy() : ?string
    {
        return $this->recordedBy;
    }

    public function recordedByEmail() : ?string
    {
        return $this->recordedByEmail;
    }

    public function notes() : ?string
    {
        return $this->notes;
    }

    public function transactionId() : ?string
    {
        return $this->transactionId;
    }

    public function paymentGateway() : ?PaymentGateway
    {
        return $this->paymentGateway;
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
            'amount' => $this->amount,
            'paid_at' => $this->paidAt,
            'paid_date' => $this->paidDate,
            'recorded_by' => $this->recordedBy,
            'recorded_by_email' => $this->recordedByEmail,
            'notes' => $this->notes,
            'transaction_id' => $this->transactionId,
            'payment_gateway' => $this->paymentGateway,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['amount'],
            $data['paid_at'],
            $data['paid_date'],
            $data['recorded_by'],
            $data['recorded_by_email'],
            $data['notes'],
            $data['transaction_id'],
            $data['payment_gateway'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
