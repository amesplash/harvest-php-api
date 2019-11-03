<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

class EstimateLineItem extends Immutable
{
    /** @var ?int */
    private $id;

    /** @var ?string */
    private $kind;

    /** @var ?string */
    private $description;

    /** @var ?int */
    private $unitPrice;

    /** @var ?int */
    private $amount;

    /** @var ?bool */
    private $taxed;

    /** @var ?bool */
    private $taxed2;

    /**
     * Creates a new Estimate Line Item instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $kind = null,
        ?string $description = null,
        ?int $unitPrice = null,
        ?int $amount = null,
        ?bool $taxed = null,
        ?bool $taxed2 = null
    ) {
        $this->id = $id;
        $this->kind = $kind;
        $this->description = $description;
        $this->unitPrice = $unitPrice;
        $this->amount = $amount;
        $this->taxed = $taxed;
        $this->taxed2 = $taxed2;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function kind() : ?string
    {
        return $this->kind;
    }

    public function description() : ?string
    {
        return $this->description;
    }

    public function unitPrice() : ?int
    {
        return $this->unitPrice;
    }

    public function amount() : ?int
    {
        return $this->amount;
    }

    public function taxed() : ?bool
    {
        return $this->taxed;
    }

    public function taxed2() : ?bool
    {
        return $this->taxed2;
    }

    public function arrayCopy() : array
    {
        return [
            'id' => $this->id,
            'kind' => $this->kind,
            'description' => $this->description,
            'unit_price' => $this->unitPrice,
            'amount' => $this->amount,
            'taxed' => $this->taxed,
            'taxed2' => $this->taxed2,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['kind'],
            $data['description'],
            $data['unit_price'],
            $data['amount'],
            $data['taxed'],
            $data['taxed2']
        );
    }
}
