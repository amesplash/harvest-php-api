<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;
use DateTimeInterface;

class UserAssignment extends Immutable
{
    /**
     * Unique ID for the user assignment.
     *
     * @var ?int
     */
    private $id;

    /**
     * Whether the user assignment is active or archived.
     *
     * @var ?bool
     */
    private $isActive;

    /**
     * Determines if the user has Project Manager permissions for the project.
     *
     * @var ?bool
     */
    private $isProjectManager;

    /**
     * Custom rate used when the project’s billBy is People and useDefaultRates is false.
     *
     * @var ?int
     */
    private $hourlyRate;

    /**
     * Budget used when the project’s budgetBy is person.
     *
     * @var ?int
     */
    private $budget;

    /**
     * Date and time the user assignment was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the user assignment was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new User Assignment instance.
     */
    public function __construct(
        ?int $id = null,
        ?bool $isActive = null,
        ?bool $isProjectManager = null,
        ?int $hourlyRate = null,
        ?int $budget = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->isActive = $isActive;
        $this->isProjectManager = $isProjectManager;
        $this->hourlyRate = $hourlyRate;
        $this->budget = $budget;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function isActive() : ?bool
    {
        return $this->isActive;
    }

    public function isProjectManager() : ?bool
    {
        return $this->isProjectManager;
    }

    public function hourlyRate() : ?int
    {
        return $this->hourlyRate;
    }

    public function budget() : ?int
    {
        return $this->budget;
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
            'is_active' => $this->isActive,
            'is_project_manager' => $this->isProjectManager,
            'hourly_rate' => $this->hourlyRate,
            'budget' => $this->budget,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['is_active'],
            $data['is_project_manager'],
            $data['hourly_rate'],
            $data['budget'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
