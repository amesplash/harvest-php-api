<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

class MessageRecipient extends Immutable
{
    /** @var ?string */
    private $name;

    /** @var ?string */
    private $email;

    /**
     * Creates a new Message Recipient instance.
     */
    public function __construct(
        ?string $name = null,
        ?string $email = null
    ) {
        $this->name = $name;
        $this->email = $email;

        parent::__construct();
    }

    public function name() : ?string
    {
        return $this->name;
    }

    public function email() : ?string
    {
        return $this->email;
    }

    public function arrayCopy() : array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['name'],
            $data['email']
        );
    }
}
