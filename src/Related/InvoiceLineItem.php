<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

class InvoiceLineItem extends Immutable
{
    /** @var ?int */
    private $id;

    /** @var ?Project */
    private $project;

    /** @var ?string */
    private $kind;

    /** @var ?string */
    private $description;

    /** @var ?float */
    private $unitPrice;

    /** @var ?float */
    private $amount;

    /** @var ?bool */
    private $taxed;

    /** @var ?bool */
    private $taxed2;

    /**
     * Creates a new Invoice Line Item instance.
     */
    public function __construct(
        ?int $id = null,
        ?Project $project = null,
        ?string $kind = null,
        ?string $description = null,
        ?float $unitPrice = null,
        ?float $amount = null,
        ?bool $taxed = null,
        ?bool $taxed2 = null
    ) {
        $this->id = $id;
        $this->project = $project;
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

    public function project() : ?Project
    {
        return $this->project;
    }

    public function kind() : ?string
    {
        return $this->kind;
    }

    public function description() : ?string
    {
        return $this->description;
    }

    public function unitPrice() : ?float
    {
        return $this->unitPrice;
    }

    public function amount() : ?float
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
            'project' => $this->project,
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
            $data['project'],
            $data['kind'],
            $data['description'],
            $data['unit_price'],
            $data['amount'],
            $data['taxed'],
            $data['taxed2']
        );
    }
}
