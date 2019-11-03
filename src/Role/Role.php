<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Role;

use Amesplash\HarvestApi\Foundation\Collection\IntArray;
use Amesplash\HarvestApi\Foundation\Entity;
use DateTimeInterface;

final class Role extends Entity
{
    /**
     * Unique ID for the role.
     *
     * @var ?int
     */
    private $id;

    /**
     * The name of the role.
     *
     * @var ?string
     */
    private $name;

    /**
     * The IDs of the users assigned to this role.
     *
     * @var ?IntArray
     */
    private $userIds;

    /**
     * Date and time the role was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the role was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Role instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?IntArray $userIds = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->userIds = $userIds;
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

    public function userIds() : ?IntArray
    {
        return $this->userIds;
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
            'user_ids' => $this->userIds,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['user_ids'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
