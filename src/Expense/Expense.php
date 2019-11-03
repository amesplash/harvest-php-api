<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Expense;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\Client;
use Amesplash\HarvestApi\Related\ExpenseCategory;
use Amesplash\HarvestApi\Related\Invoice;
use Amesplash\HarvestApi\Related\Project;
use Amesplash\HarvestApi\Related\Receipt;
use Amesplash\HarvestApi\Related\User;
use Amesplash\HarvestApi\Related\UserAssignment;
use DateTimeInterface;

final class Expense extends Entity
{
    /**
     * Unique ID for the expense.
     *
     * @var ?int
     */
    private $id;

    /**
     * An object containing the expense’s client id, name, and currency.
     *
     * @var ?Client
     */
    private $client;

    /**
     * An object containing the expense’s project id, name, and code.
     *
     * @var ?Project
     */
    private $project;

    /**
     * An object containing the expense’s expense category id, name, unitPrice, and unitName.
     *
     * @var ?ExpenseCategory
     */
    private $expenseCategory;

    /**
     * An object containing the id and name of the user that recorded the expense.
     *
     * @var ?User
     */
    private $user;

    /**
     * A user assignment object of the user that recorded the expense.
     *
     * @var ?UserAssignment
     */
    private $userAssignment;

    /**
     * An object containing the expense’s receipt URL and file name.
     *
     * @var ?Receipt
     */
    private $receipt;

    /**
     * Once the expense has been invoiced, this field will include the associated invoice’s id and number.
     *
     * @var ?Invoice
     */
    private $invoice;

    /**
     * Textual notes used to describe the expense.
     *
     * @var ?string
     */
    private $notes;

    /**
     * Whether the expense is billable or not.
     *
     * @var ?bool
     */
    private $billable;

    /**
     * Whether the expense has been approved or closed for some other reason.
     *
     * @var ?bool
     */
    private $isClosed;

    /**
     * Whether the expense has been been invoiced, approved, or the project or person related to the expense is archived.
     *
     * @var ?bool
     */
    private $isLocked;

    /**
     * Whether or not the expense has been marked as invoiced.
     *
     * @var ?bool
     */
    private $isBilled;

    /**
     * An explanation of why the expense has been locked.
     *
     * @var ?string
     */
    private $lockedReason;

    /**
     * Date the expense occurred.
     *
     * @var ?DateTimeInterface
     */
    private $spentDate;

    /**
     * Date and time the expense was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the expense was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Expense instance.
     */
    public function __construct(
        ?int $id = null,
        ?Client $client = null,
        ?Project $project = null,
        ?ExpenseCategory $expenseCategory = null,
        ?User $user = null,
        ?UserAssignment $userAssignment = null,
        ?Receipt $receipt = null,
        ?Invoice $invoice = null,
        ?string $notes = null,
        ?bool $billable = null,
        ?bool $isClosed = null,
        ?bool $isLocked = null,
        ?bool $isBilled = null,
        ?string $lockedReason = null,
        ?DateTimeInterface $spentDate = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->client = $client;
        $this->project = $project;
        $this->expenseCategory = $expenseCategory;
        $this->user = $user;
        $this->userAssignment = $userAssignment;
        $this->receipt = $receipt;
        $this->invoice = $invoice;
        $this->notes = $notes;
        $this->billable = $billable;
        $this->isClosed = $isClosed;
        $this->isLocked = $isLocked;
        $this->isBilled = $isBilled;
        $this->lockedReason = $lockedReason;
        $this->spentDate = $spentDate;
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

    public function project() : ?Project
    {
        return $this->project;
    }

    public function expenseCategory() : ?ExpenseCategory
    {
        return $this->expenseCategory;
    }

    public function user() : ?User
    {
        return $this->user;
    }

    public function userAssignment() : ?UserAssignment
    {
        return $this->userAssignment;
    }

    public function receipt() : ?Receipt
    {
        return $this->receipt;
    }

    public function invoice() : ?Invoice
    {
        return $this->invoice;
    }

    public function notes() : ?string
    {
        return $this->notes;
    }

    public function billable() : ?bool
    {
        return $this->billable;
    }

    public function isClosed() : ?bool
    {
        return $this->isClosed;
    }

    public function isLocked() : ?bool
    {
        return $this->isLocked;
    }

    public function isBilled() : ?bool
    {
        return $this->isBilled;
    }

    public function lockedReason() : ?string
    {
        return $this->lockedReason;
    }

    public function spentDate() : ?DateTimeInterface
    {
        return $this->spentDate;
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
            'project' => $this->project,
            'expense_category' => $this->expenseCategory,
            'user' => $this->user,
            'user_assignment' => $this->userAssignment,
            'receipt' => $this->receipt,
            'invoice' => $this->invoice,
            'notes' => $this->notes,
            'billable' => $this->billable,
            'is_closed' => $this->isClosed,
            'is_locked' => $this->isLocked,
            'is_billed' => $this->isBilled,
            'locked_reason' => $this->lockedReason,
            'spent_date' => $this->spentDate,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['client'],
            $data['project'],
            $data['expense_category'],
            $data['user'],
            $data['user_assignment'],
            $data['receipt'],
            $data['invoice'],
            $data['notes'],
            $data['billable'],
            $data['is_closed'],
            $data['is_locked'],
            $data['is_billed'],
            $data['locked_reason'],
            $data['spent_date'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
