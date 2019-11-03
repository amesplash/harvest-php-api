<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

class Invoice extends Immutable
{
    /** @var ?int */
    private $id;

    /** @var ?string */
    private $number;

    /**
     * Creates a new Invoice instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $number = null
    ) {
        $this->id = $id;
        $this->number = $number;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function number() : ?string
    {
        return $this->number;
    }

    public function arrayCopy() : array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['number']
        );
    }
}
