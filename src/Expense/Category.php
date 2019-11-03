<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Expense;

use Amesplash\HarvestApi\Foundation\Entity;
use DateTimeInterface;

final class Category extends Entity
{
    /**
     * Unique ID for the expense category.
     *
     * @var ?int
     */
    private $id;

    /**
     * The name of the expense category.
     *
     * @var ?string
     */
    private $name;

    /**
     * The unit name of the expense category.
     *
     * @var ?string
     */
    private $unitName;

    /**
     * The unit price of the expense category.
     *
     * @var ?float
     */
    private $unitPrice;

    /**
     * Whether the expense category is active or archived.
     *
     * @var ?bool
     */
    private $isActive;

    /**
     * Date and time the expense category was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the expense category was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Expense Category instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?string $unitName = null,
        ?float $unitPrice = null,
        ?bool $isActive = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->unitName = $unitName;
        $this->unitPrice = $unitPrice;
        $this->isActive = $isActive;
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

    public function unitName() : ?string
    {
        return $this->unitName;
    }

    public function unitPrice() : ?float
    {
        return $this->unitPrice;
    }

    public function isActive() : ?bool
    {
        return $this->isActive;
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
            'unit_name' => $this->unitName,
            'unit_price' => $this->unitPrice,
            'is_active' => $this->isActive,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['unit_name'],
            $data['unit_price'],
            $data['is_active'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
