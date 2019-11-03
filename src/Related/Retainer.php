<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

final class Retainer extends Immutable
{
    /** @var ?int */
    private $id;

    /**
     * Creates a new Retainer instance.
     */
    public function __construct(
        ?int $id = null
    ) {
        $this->id = $id;

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
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id']
        );
    }
}
