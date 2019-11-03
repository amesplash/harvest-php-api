<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Invoice;

use Amesplash\HarvestApi\Foundation\Entity;
use DateTimeInterface;

final class ItemCategory extends Entity
{
    /**
     * Unique ID for the invoice item category.
     *
     * @var ?int
     */
    private $id;

    /**
     * The name of the invoice item category.
     *
     * @var ?string
     */
    private $name;

    /**
     * Whether this invoice item category is used for billable hours when generating an invoice.
     *
     * @var ?bool
     */
    private $useAsService;

    /**
     * Whether this invoice item category is used for expenses when generating an invoice.
     *
     * @var ?bool
     */
    private $useAsExpense;

    /**
     * Date and time the invoice item category was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the invoice item category was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Invoice Item Category instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?bool $useAsService = null,
        ?bool $useAsExpense = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->useAsService = $useAsService;
        $this->useAsExpense = $useAsExpense;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function name() : ?string
    {
        return $this->name;
    }

    public function useAsService() : ?bool
    {
        return $this->useAsService;
    }

    public function useAsExpense() : ?bool
    {
        return $this->useAsExpense;
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
            'name' => $this->name,
            'use_as_service' => $this->useAsService,
            'use_as_expense' => $this->useAsExpense,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['use_as_service'],
            $data['use_as_expense'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
