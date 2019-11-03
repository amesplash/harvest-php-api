<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;
use DateTimeInterface;

class TaskAssignment extends Immutable
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
     * Whether the task assignment is billable or not.
     * For example: if set to true, all time tracked on t
     * his project for the associated task will be marked as billable.
     *
     * @var ?bool
     */
    private $billable;

    /**
     * Custom rate used when the project’s billBy is People and useDefaultRates is false.
     *
     * @var ?int
     */
    private $hourlyRate;

    /**
     * An object containing the id and name of the associated task.
     *
     * @var ?Task
     */
    private $task;

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
     * Creates a new Task Assignment instance.
     */
    public function __construct(
        ?int $id = null,
        ?bool $isActive = null,
        ?int $hourlyRate = null,
        ?int $budget = null,
        ?Task $task = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->isActive = $isActive;
        $this->hourlyRate = $hourlyRate;
        $this->budget = $budget;
        $this->task = $task;
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

    public function hourlyRate() : ?int
    {
        return $this->hourlyRate;
    }

    public function budget() : ?int
    {
        return $this->budget;
    }

    public function task() : ?Task
    {
        return $this->task;
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
            'hourly_rate' => $this->hourlyRate,
            'budget' => $this->budget,
            'task' => $this->task,
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
