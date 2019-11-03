<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Project;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\Client;
use DateTimeInterface;

final class Project extends Entity
{
    /**
     * Unique ID for the project.
     *
     * @var ?int
     */
    private $id;

    /**
     * An object containing the project’s client id, name, and currency.
     *
     * @var ?Client
     */
    private $client;

    /**
     * Unique name for the project.
     *
     * @var ?string
     */
    private $name;

    /**
     * The code associated with the project.
     *
     * @var ?string
     */
    private $code;

    /**
     * Whether the project is active or archived.
     *
     * @var ?bool
     */
    private $isActive;

    /**
     * Whether the project is billable or not.
     *
     * @var ?bool
     */
    private $isBillable;

    /**
     * Whether the project is a fixed-fee project or not.
     *
     * @var ?bool
     */
    private $isFixedFee;

    /**
     * The method by which the project is invoiced.
     *
     * @var ?string
     */
    private $billBy;

    /**
     * Rate for projects billed by Project Hourly Rate.
     *
     * @var ?float
     */
    private $hourlyRate;

    /**
     * The budget in hours for the project when budgeting by time.
     *
     * @var ?float
     */
    private $budget;

    /**
     * The method by which the project is budgeted.
     *
     * @var ?string
     */
    private $budgetBy;

    /**
     * Option to have the budget reset every month.
     *
     * @var ?bool
     */
    private $budgetIsMonthly;

    /**
     * Whether Project Managers should be notified when the project goes over budget.
     *
     * @var ?bool
     */
    private $notifyWhenOverBudget;

    /**
     * Percentage value used to trigger over budget email alerts.
     *
     * @var ?float
     */
    private $overBudgetNotificationPercentage;

    /**
     * Date of last over budget notification. If none have been sent, this will be null.
     *
     * @var ?DateTimeInterface
     */
    private $overBudgetNotificationDate;

    /**
     * Option to show project budget to all employees. Does not apply to Total Project Fee projects.
     *
     * @var ?bool
     */
    private $showBudgetToAll;

    /**
     * The monetary budget for the project when budgeting by money.
     *
     * @var ?float
     */
    private $costBudget;

    /**
     * Option for budget of Total Project Fees projects to include tracked expenses.
     *
     * @var ?bool
     */
    private $costBudgetIncludeExpenses;

    /**
     * The amount you plan to invoice for the project. Only used by fixed-fee projects.
     *
     * @var ?float
     */
    private $fee;

    /**
     * Project notes.
     *
     * @var ?string
     */
    private $notes;

    /**
     * Date the project was started.
     *
     * @var ?DateTimeInterface
     */
    private $startsOn;

    /**
     * Date the project will end.
     *
     * @var ?DateTimeInterface
     */
    private $endsOn;

    /**
     * Date and time the project was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the project was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Project instance.
     */
    public function __construct(
        ?int $id = null,
        ?Client $client = null,
        ?string $name = null,
        ?string $code = null,
        ?bool $isActive = null,
        ?bool $isBillable = null,
        ?bool $isFixedFee = null,
        ?string $billBy = null,
        ?float $hourlyRate = null,
        ?float $budget = null,
        ?string $budgetBy = null,
        ?bool $budgetIsMonthly = null,
        ?bool $notifyWhenOverBudget = null,
        ?float $overBudgetNotificationPercentage = null,
        ?DateTimeInterface $overBudgetNotificationDate = null,
        ?bool $showBudgetToAll = null,
        ?float $costBudget = null,
        ?bool $costBudgetIncludeExpenses = null,
        ?float $fee = null,
        ?string $notes = null,
        ?DateTimeInterface $startsOn = null,
        ?DateTimeInterface $endsOn = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->client = $client;
        $this->name = $name;
        $this->code = $code;
        $this->isActive = $isActive;
        $this->isBillable = $isBillable;
        $this->isFixedFee = $isFixedFee;
        $this->billBy = $billBy;
        $this->hourlyRate = $hourlyRate;
        $this->budget = $budget;
        $this->budgetBy = $budgetBy;
        $this->budgetIsMonthly = $budgetIsMonthly;
        $this->notifyWhenOverBudget = $notifyWhenOverBudget;
        $this->overBudgetNotificationPercentage = $overBudgetNotificationPercentage;
        $this->overBudgetNotificationDate = $overBudgetNotificationDate;
        $this->showBudgetToAll = $showBudgetToAll;
        $this->costBudget = $costBudget;
        $this->costBudgetIncludeExpenses = $costBudgetIncludeExpenses;
        $this->fee = $fee;
        $this->notes = $notes;
        $this->startsOn = $startsOn;
        $this->endsOn = $endsOn;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function client() : ?Client
    {
        return $this->client;
    }

    public function name() : ?string
    {
        return $this->name;
    }

    public function code() : ?string
    {
        return $this->code;
    }

    public function isActive() : ?bool
    {
        return $this->isActive;
    }

    public function isBillable() : ?bool
    {
        return $this->isBillable;
    }

    public function isFixedFee() : ?bool
    {
        return $this->isFixedFee;
    }

    public function billBy() : ?string
    {
        return $this->billBy;
    }

    public function hourlyRate() : ?float
    {
        return $this->hourlyRate;
    }

    public function budget() : ?float
    {
        return $this->budget;
    }

    public function budgetBy() : ?string
    {
        return $this->budgetBy;
    }

    public function budgetIsMonthly() : ?bool
    {
        return $this->budgetIsMonthly;
    }

    public function notifyWhenOverBudget() : ?bool
    {
        return $this->notifyWhenOverBudget;
    }

    public function overBudgetNotificationPercentage() : ?float
    {
        return $this->overBudgetNotificationPercentage;
    }

    public function overBudgetNotificationDate() : ?DateTimeInterface
    {
        return $this->overBudgetNotificationDate;
    }

    public function showBudgetToAll() : ?bool
    {
        return $this->showBudgetToAll;
    }

    public function costBudget() : ?float
    {
        return $this->costBudget;
    }

    public function costBudgetIncludeExpenses() : ?bool
    {
        return $this->costBudgetIncludeExpenses;
    }

    public function fee() : ?float
    {
        return $this->fee;
    }

    public function notes() : ?string
    {
        return $this->notes;
    }

    public function startsOn() : ?DateTimeInterface
    {
        return $this->startsOn;
    }

    public function endsOn() : ?DateTimeInterface
    {
        return $this->endsOn;
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
            'client' => $this->client,
            'name' => $this->name,
            'code' => $this->code,
            'is_active' => $this->isActive,
            'is_billable' => $this->isBillable,
            'is_fixed_fee' => $this->isFixedFee,
            'bill_by' => $this->billBy,
            'hourly_rate' => $this->hourlyRate,
            'budget' => $this->budget,
            'budget_by' => $this->budgetBy,
            'budget_is_monthly' => $this->budgetIsMonthly,
            'notify_when_over_budget' => $this->notifyWhenOverBudget,
            'over_budget_notification_percentage' => $this->overBudgetNotificationPercentage,
            'over_budget_notification_date' => $this->overBudgetNotificationDate,
            'show_budget_to_all' => $this->showBudgetToAll,
            'cost_budget' => $this->costBudget,
            'cost_budget_include_expenses' => $this->costBudgetIncludeExpenses,
            'fee' => $this->fee,
            'notes' => $this->notes,
            'starts_on' => $this->startsOn,
            'ends_on' => $this->endsOn,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['client'],
            $data['name'],
            $data['code'],
            $data['is_active'],
            $data['is_billable'],
            $data['is_fixed_fee'],
            $data['bill_by'],
            $data['hourly_rate'],
            $data['budget'],
            $data['budget_by'],
            $data['budget_is_monthly'],
            $data['notify_when_over_budget'],
            $data['over_budget_notification_percentage'],
            $data['over_budget_notification_date'],
            $data['show_budget_to_all'],
            $data['cost_budget'],
            $data['cost_budget_include_expenses'],
            $data['fee'],
            $data['notes'],
            $data['starts_on'],
            $data['ends_on'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
