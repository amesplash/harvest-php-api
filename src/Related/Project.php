<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

class Project extends Immutable
{
    /** @var ?int */
    private $id;

    /** @var ?string */
    private $name;

    /** @var ?string */
    private $code;

    /**
     * Creates a new Project instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?string $code = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;

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

    public function code() : ?string
    {
        return $this->code;
    }

    public function arrayCopy() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['code']
        );
    }
}
