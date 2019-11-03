<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Timesheet;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\Client;
use Amesplash\HarvestApi\Related\ExternalReference;
use Amesplash\HarvestApi\Related\Invoice;
use Amesplash\HarvestApi\Related\Project;
use Amesplash\HarvestApi\Related\Task;
use Amesplash\HarvestApi\Related\TaskAssignment;
use Amesplash\HarvestApi\Related\User;
use Amesplash\HarvestApi\Related\UserAssignment;
use DateTimeInterface;

final class TimeEntry extends Entity
{
    /**
     * Unique ID for the time entry.
     *
     * @var ?int
     */
    private $id;

    /**
     * Date of the time entry.
     *
     * @var ?DateTimeInterface
     */
    private $spentDate;

    /**
     * An object containing the id and name of the associated user.
     *
     * @var ?User
     */
    private $user;

    /**
     * A user assignment object of the associated user.
     *
     * @var ?UserAssignment
     */
    private $userAssignment;

    /**
     * An object containing the id and name of the associated client.
     *
     * @var ?Client
     */
    private $client;

    /**
     * An object containing the id and name of the associated project.
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
     * A task assignment object of the associated task.
     *
     * @var ?TaskAssignment
     */
    private $taskAssignment;

    /**
     * An object containing the id, groupId, permalink, service, and serviceIconUrl of the associated external reference.
     *
     * @var ?ExternalReference
     */
    private $externalReference;

    /**
     * Once the time entry has been invoiced, this field will include the associated invoice’s id and number.
     *
     * @var ?Invoice
     */
    private $invoice;

    /**
     * Number of (decimal time) hours tracked in this time entry.
     *
     * @var ?float
     */
    private $hours;

    /**
     * Notes attached to the time entry.
     *
     * @var ?string
     */
    private $notes;

    /**
     * Whether or not the time entry has been locked.
     *
     * @var ?bool
     */
    private $isLocked;

    /**
     * Why the time entry has been locked.
     *
     * @var ?string
     */
    private $lockedReason;

    /**
     * Whether or not the time entry has been approved via Timesheet Approval.
     *
     * @var ?bool
     */
    private $isClosed;

    /**
     * Whether or not the time entry has been marked as invoiced.
     *
     * @var ?bool
     */
    private $isBilled;

    /**
     * Date and time the timer was started (if tracking by duration). Use the ISO 8601 Format.
     *
     * @var ?DateTimeInterface
     */
    private $timerStartedAt;

    /**
     * Time the time entry was started (if tracking by start/end times).
     *
     * @var ?string
     */
    private $startedTime;

    /**
     * Time the time entry was ended (if tracking by start/end times).
     *
     * @var ?string
     */
    private $endedTime;

    /**
     * Whether or not the time entry is currently running.
     *
     * @var ?bool
     */
    private $isRunning;

    /**
     * Whether or not the time entry is billable.
     *
     * @var ?bool
     */
    private $billable;

    /**
     * Whether or not the time entry counts towards the project budget.
     *
     * @var ?bool
     */
    private $budgeted;

    /**
     * The billable rate for the time entry.
     *
     * @var ?float
     */
    private $billableRate;

    /**
     * The cost rate for the time entry.
     *
     * @var ?float
     */
    private $costRate;

    /**
     * Date and time the time entry was created. Use the ISO 8601 Format.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the time entry was last updated. Use the ISO 8601 Format.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Time Entrie instance.
     */
    public function __construct(
        ?int $id = null,
        ?DateTimeInterface $spentDate = null,
        ?User $user = null,
        ?UserAssignment $userAssignment = null,
        ?Client $client = null,
        ?Project $project = null,
        ?Task $task = null,
        ?TaskAssignment $taskAssignment = null,
        ?ExternalReference $externalReference = null,
        ?Invoice $invoice = null,
        ?float $hours = null,
        ?string $notes = null,
        ?bool $isLocked = null,
        ?string $lockedReason = null,
        ?bool $isClosed = null,
        ?bool $isBilled = null,
        ?DateTimeInterface $timerStartedAt = null,
        ?string $startedTime = null,
        ?string $endedTime = null,
        ?bool $isRunning = null,
        ?bool $billable = null,
        ?bool $budgeted = null,
        ?float $billableRate = null,
        ?float $costRate = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->spentDate = $spentDate;
        $this->user = $user;
        $this->userAssignment = $userAssignment;
        $this->client = $client;
        $this->project = $project;
        $this->task = $task;
        $this->taskAssignment = $taskAssignment;
        $this->externalReference = $externalReference;
        $this->invoice = $invoice;
        $this->hours = $hours;
        $this->notes = $notes;
        $this->isLocked = $isLocked;
        $this->lockedReason = $lockedReason;
        $this->isClosed = $isClosed;
        $this->isBilled = $isBilled;
        $this->timerStartedAt = $timerStartedAt;
        $this->startedTime = $startedTime;
        $this->endedTime = $endedTime;
        $this->isRunning = $isRunning;
        $this->billable = $billable;
        $this->budgeted = $budgeted;
        $this->billableRate = $billableRate;
        $this->costRate = $costRate;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function spentDate() : ?DateTimeInterface
    {
        return $this->spentDate;
    }

    public function user() : ?User
    {
        return $this->user;
    }

    public function userAssignment() : ?UserAssignment
    {
        return $this->userAssignment;
    }

    public function client() : ?Client
    {
        return $this->client;
    }

    public function project() : ?Project
    {
        return $this->project;
    }

    public function task() : ?Task
    {
        return $this->task;
    }

    public function taskAssignment() : ?TaskAssignment
    {
        return $this->taskAssignment;
    }

    public function externalReference() : ?ExternalReference
    {
        return $this->externalReference;
    }

    public function invoice() : ?Invoice
    {
        return $this->invoice;
    }

    public function hours() : ?float
    {
        return $this->hours;
    }

    public function notes() : ?string
    {
        return $this->notes;
    }

    public function isLocked() : ?bool
    {
        return $this->isLocked;
    }

    public function lockedReason() : ?string
    {
        return $this->lockedReason;
    }

    public function isClosed() : ?bool
    {
        return $this->isClosed;
    }

    public function isBilled() : ?bool
    {
        return $this->isBilled;
    }

    public function timerStartedAt() : ?DateTimeInterface
    {
        return $this->timerStartedAt;
    }

    public function startedTime() : ?string
    {
        return $this->startedTime;
    }

    public function endedTime() : ?string
    {
        return $this->endedTime;
    }

    public function isRunning() : ?bool
    {
        return $this->isRunning;
    }

    public function billable() : ?bool
    {
        return $this->billable;
    }

    public function budgeted() : ?bool
    {
        return $this->budgeted;
    }

    public function billableRate() : ?float
    {
        return $this->billableRate;
    }

    public function costRate() : ?float
    {
        return $this->costRate;
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
            'spent_date' => $this->spentDate,
            'user' => $this->user,
            'user_assignment' => $this->userAssignment,
            'client' => $this->client,
            'project' => $this->project,
            'task' => $this->task,
            'task_assignment' => $this->taskAssignment,
            'external_reference' => $this->externalReference,
            'invoice' => $this->invoice,
            'hours' => $this->hours,
            'notes' => $this->notes,
            'is_locked' => $this->isLocked,
            'locked_reason' => $this->lockedReason,
            'is_closed' => $this->isClosed,
            'is_billed' => $this->isBilled,
            'timer_started_at' => $this->timerStartedAt,
            'started_time' => $this->startedTime,
            'ended_time' => $this->endedTime,
            'is_running' => $this->isRunning,
            'billable' => $this->billable,
            'budgeted' => $this->budgeted,
            'billable_rate' => $this->billableRate,
            'cost_rate' => $this->costRate,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['spent_date'],
            $data['user'],
            $data['user_assignment'],
            $data['client'],
            $data['project'],
            $data['task'],
            $data['task_assignment'],
            $data['external_reference'],
            $data['invoice'],
            $data['hours'],
            $data['notes'],
            $data['is_locked'],
            $data['locked_reason'],
            $data['is_closed'],
            $data['is_billed'],
            $data['timer_started_at'],
            $data['started_time'],
            $data['ended_time'],
            $data['is_running'],
            $data['billable'],
            $data['budgeted'],
            $data['billable_rate'],
            $data['cost_rate'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
