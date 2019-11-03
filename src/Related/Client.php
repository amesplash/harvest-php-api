<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

class Client extends Immutable
{
    /** @var ?int */
    private $id;

    /** @var ?string */
    private $name;

    /** @var ?string */
    private $currency;

    /**
     * Creates a new Client instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?string $currency = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->currency = $currency;

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

    public function currency() : ?string
    {
        return $this->currency;
    }

    public function arrayCopy() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'currency' => $this->currency,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'] ?? null,
            $data['name'] ?? null,
            $data['currency'] ?? null
        );
    }
}
