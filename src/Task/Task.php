<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Task;

use Amesplash\HarvestApi\Foundation\Entity;
use DateTimeInterface;

final class Task extends Entity
{
    /**
     * Unique ID for the task.
     *
     * @var ?int
     */
    private $id;

    /**
     * The name of the task.
     *
     * @var ?string
     */
    private $name;

    /**
     * Used in determining whether default tasks should be marked billable when creating a new project.
     *
     * @var ?bool
     */
    private $billableByDefault;

    /**
     * The hourly rate to use for this task when it is added to a project.
     *
     * @var ?float
     */
    private $defaultHourlyRate;

    /**
     * Whether this task should be automatically added to future projects.
     *
     * @var ?bool
     */
    private $isDefault;

    /**
     * Whether this task is active or archived.
     *
     * @var ?bool
     */
    private $isActive;

    /**
     * Date and time the task was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the task was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Task instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?bool $billableByDefault = null,
        ?float $defaultHourlyRate = null,
        ?bool $isDefault = null,
        ?bool $isActive = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->billableByDefault = $billableByDefault;
        $this->defaultHourlyRate = $defaultHourlyRate;
        $this->isDefault = $isDefault;
        $this->isActive = $isActive;
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

    public function billableByDefault() : ?bool
    {
        return $this->billableByDefault;
    }

    public function defaultHourlyRate() : ?float
    {
        return $this->defaultHourlyRate;
    }

    public function isDefault() : ?bool
    {
        return $this->isDefault;
    }

    public function isActive() : ?bool
    {
        return $this->isActive;
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
            'billable_by_default' => $this->billableByDefault,
            'default_hourly_rate' => $this->defaultHourlyRate,
            'is_default' => $this->isDefault,
            'is_active' => $this->isActive,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['billable_by_default'],
            $data['default_hourly_rate'],
            $data['is_default'],
            $data['is_active'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
