<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Estimate;

use Amesplash\HarvestApi\Foundation\Entity;
use DateTimeInterface;

final class ItemCategory extends Entity
{
    /**
     * Unique ID for the estimate item category.
     *
     * @var ?int
     */
    private $id;

    /**
     * The name of the estimate item category.
     *
     * @var ?string
     */
    private $name;

    /**
     * Date and time the estimate item category was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the estimate item category was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Estimate Item Category instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
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
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
