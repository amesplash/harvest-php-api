<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\User;

use Amesplash\HarvestApi\Foundation\Entity;
use DateTimeInterface;

final class CostRate extends Entity
{
    /**
     * Unique ID for the cost rate.
     *
     * @var ?int
     */
    private $id;

    /**
     * The amount of the cost rate.
     *
     * @var ?float
     */
    private $amount;

    /**
     * The date the cost rate is effective.
     *
     * @var ?DateTimeInterface
     */
    private $startDate;

    /**
     * The date the cost rate is no longer effective. This date is calculated by Harvest.
     *
     * @var ?DateTimeInterface
     */
    private $endDate;

    /**
     * Date and time the cost rate was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the cost rate was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new User Cost Rate instance.
     */
    public function __construct(
        ?int $id = null,
        ?float $amount = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->amount = $amount;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
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

    public function startDate() : ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function endDate() : ?DateTimeInterface
    {
        return $this->endDate;
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
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['amount'],
            $data['start_date'],
            $data['end_date'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
