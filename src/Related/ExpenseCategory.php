<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

class ExpenseCategory extends Immutable
{
    /** @var ?int */
    private $id;

    /** @var ?string */
    private $name;

    /** @var ?int */
    private $unitPrice;

    /** @var ?string */
    private $unitName;

    /**
     * Creates a new Expense Category instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?int $unitPrice = null,
        ?string $unitName = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->unitPrice = $unitPrice;
        $this->unitName = $unitName;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function arrayCopy() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'unit_price' => $this->unitPrice,
            'unit_name' => $this->unitName,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['unit_price'],
            $data['unit_name']
        );
    }
}
