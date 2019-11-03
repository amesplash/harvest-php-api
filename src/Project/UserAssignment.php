<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Project;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\Project;
use Amesplash\HarvestApi\Related\User;
use DateTimeInterface;

final class UserAssignment extends Entity
{
    /**
     * Unique ID for the user assignment.
     *
     * @var ?int
     */
    private $id;

    /**
     * An object containing the id, name, and code of the associated project.
     *
     * @var ?Project
     */
    private $project;

    /**
     * An object containing the id and name of the associated user.
     *
     * @var ?User
     */
    private $user;

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
     * Determines which billable rate(s) will be used on the project for this user when billBy is People. When true, the project will use the user’s default billable rates. When false, the project will use the custom rate defined on this user assignment.
     *
     * @var ?bool
     */
    private $useDefaultRates;

    /**
     * Custom rate used when the project’s billBy is People and useDefaultRates is false.
     *
     * @var ?float
     */
    private $hourlyRate;

    /**
     * Budget used when the project’s budgetBy is person.
     *
     * @var ?float
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
     * Creates a new Project User Assignment instance.
     */
    public function __construct(
        ?int $id = null,
        ?Project $project = null,
        ?User $user = null,
        ?bool $isActive = null,
        ?bool $isProjectManager = null,
        ?bool $useDefaultRates = null,
        ?float $hourlyRate = null,
        ?float $budget = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->project = $project;
        $this->user = $user;
        $this->isActive = $isActive;
        $this->isProjectManager = $isProjectManager;
        $this->useDefaultRates = $useDefaultRates;
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

    public function project() : ?Project
    {
        return $this->project;
    }

    public function user() : ?User
    {
        return $this->user;
    }

    public function isActive() : ?bool
    {
        return $this->isActive;
    }

    public function isProjectManager() : ?bool
    {
        return $this->isProjectManager;
    }

    public function useDefaultRates() : ?bool
    {
        return $this->useDefaultRates;
    }

    public function hourlyRate() : ?float
    {
        return $this->hourlyRate;
    }

    public function budget() : ?float
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
            'project' => $this->project,
            'user' => $this->user,
            'is_active' => $this->isActive,
            'is_project_manager' => $this->isProjectManager,
            'use_default_rates' => $this->useDefaultRates,
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
            $data['project'],
            $data['user'],
            $data['is_active'],
            $data['is_project_manager'],
            $data['use_default_rates'],
            $data['hourly_rate'],
            $data['budget'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
