<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\User;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\Client;
use Amesplash\HarvestApi\Related\Project;
use Amesplash\HarvestApi\Related\TaskAssignments;
use DateTimeInterface;

final class ProjectAssignment extends Entity
{
    /**
     * Unique ID for the project assignment.
     *
     * @var ?int
     */
    private $id;

    /**
     * Whether the project assignment is active or archived.
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
     * Date and time the project assignment was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the project assignment was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * An object containing the assigned project id, name, and code.
     *
     * @var ?Project
     */
    private $project;

    /**
     * An object containing the project’s client id and name.
     *
     * @var ?Client
     */
    private $client;

    /**
     * Array of task assignment objects associated with the project.
     *
     * @var ?TaskAssignments
     */
    private $taskAssignments;

    /**
     * Creates a new User Project Assignment instance.
     */
    public function __construct(
        ?int $id = null,
        ?bool $isActive = null,
        ?bool $isProjectManager = null,
        ?bool $useDefaultRates = null,
        ?float $hourlyRate = null,
        ?float $budget = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null,
        ?Project $project = null,
        ?Client $client = null,
        ?TaskAssignments $taskAssignments = null
    ) {
        $this->id = $id;
        $this->isActive = $isActive;
        $this->isProjectManager = $isProjectManager;
        $this->useDefaultRates = $useDefaultRates;
        $this->hourlyRate = $hourlyRate;
        $this->budget = $budget;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->project = $project;
        $this->client = $client;
        $this->taskAssignments = $taskAssignments;

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

    public function project() : ?Project
    {
        return $this->project;
    }

    public function client() : ?Client
    {
        return $this->client;
    }

    public function taskAssignments() : ?TaskAssignments
    {
        return $this->taskAssignments;
    }

    public function arrayCopy() : array
    {
        return [
            'id' => $this->id,
            'is_active' => $this->isActive,
            'is_project_manager' => $this->isProjectManager,
            'use_default_rates' => $this->useDefaultRates,
            'hourly_rate' => $this->hourlyRate,
            'budget' => $this->budget,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
            'project' => $this->project,
            'client' => $this->client,
            'task_assignments' => $this->taskAssignments,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['is_active'],
            $data['is_project_manager'],
            $data['use_default_rates'],
            $data['hourly_rate'],
            $data['budget'],
            $data['created_at'],
            $data['updated_at'],
            $data['project'],
            $data['client'],
            $data['task_assignments']
        );
    }
}
