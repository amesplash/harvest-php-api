<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Client;

use Amesplash\HarvestApi\Foundation\Entity;
use DateTimeInterface;

final class Client extends Entity
{
    /**
     * Unique ID for the client.
     *
     * @var ?int
     */
    private $id;

    /**
     * A textual description of the client.
     *
     * @var ?string
     */
    private $name;

    /**
     * Whether the client is active or archived.
     *
     * @var ?bool
     */
    private $isActive;

    /**
     * The physical address for the client.
     *
     * @var ?string
     */
    private $address;

    /**
     * Used to build a URL to your client’s invoice dashboard:https://{ACCOUNTSUBDOMAIN}.harvestapp.com/client/invoices/{statementKey}
     *
     * @var ?string
     */
    private $statementKey;

    /**
     * The currency code associated with this client.
     *
     * @var ?string
     */
    private $currency;

    /**
     * Date and time the client was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the client was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Client instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?bool $isActive = null,
        ?string $address = null,
        ?string $statementKey = null,
        ?string $currency = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->isActive = $isActive;
        $this->address = $address;
        $this->statementKey = $statementKey;
        $this->currency = $currency;
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

    public function isActive() : ?bool
    {
        return $this->isActive;
    }

    public function address() : ?string
    {
        return $this->address;
    }

    public function statementKey() : ?string
    {
        return $this->statementKey;
    }

    public function currency() : ?string
    {
        return $this->currency;
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
            'is_active' => $this->isActive,
            'address' => $this->address,
            'statement_key' => $this->statementKey,
            'currency' => $this->currency,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['is_active'],
            $data['address'],
            $data['statement_key'],
            $data['currency'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
