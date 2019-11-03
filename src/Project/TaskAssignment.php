<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Project;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\Project;
use Amesplash\HarvestApi\Related\Task;
use DateTimeInterface;

final class TaskAssignment extends Entity
{
    /**
     * Unique ID for the task assignment.
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
     * An object containing the id and name of the associated task.
     *
     * @var ?Task
     */
    private $task;

    /**
     * Whether the task assignment is active or archived.
     *
     * @var ?bool
     */
    private $isActive;

    /**
     * Whether the task assignment is billable or not. For example: if set to true, all time tracked on this project for the associated task will be marked as billable.
     *
     * @var ?bool
     */
    private $billable;

    /**
     * Rate used when the project’s billBy is Tasks.
     *
     * @var ?float
     */
    private $hourlyRate;

    /**
     * Budget used when the project’s budgetBy is task or taskFees.
     *
     * @var ?float
     */
    private $budget;

    /**
     * Date and time the task assignment was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the task assignment was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Project Task Assignment instance.
     */
    public function __construct(
        ?int $id = null,
        ?Project $project = null,
        ?Task $task = null,
        ?bool $isActive = null,
        ?bool $billable = null,
        ?float $hourlyRate = null,
        ?float $budget = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->project = $project;
        $this->task = $task;
        $this->isActive = $isActive;
        $this->billable = $billable;
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

    public function task() : ?Task
    {
        return $this->task;
    }

    public function isActive() : ?bool
    {
        return $this->isActive;
    }

    public function billable() : ?bool
    {
        return $this->billable;
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
            'task' => $this->task,
            'is_active' => $this->isActive,
            'billable' => $this->billable,
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
            $data['task'],
            $data['is_active'],
            $data['billable'],
            $data['hourly_rate'],
            $data['budget'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
