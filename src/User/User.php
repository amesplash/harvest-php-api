<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\User;

use Amesplash\HarvestApi\Foundation\Collection\StringArray;
use Amesplash\HarvestApi\Foundation\Entity;
use DateTimeInterface;

final class User extends Entity
{
    /**
     * Unique ID for the user.
     *
     * @var ?int
     */
    private $id;

    /**
     * The first name of the user.
     *
     * @var ?string
     */
    private $firstName;

    /**
     * The last name of the user.
     *
     * @var ?string
     */
    private $lastName;

    /**
     * The email address of the user.
     *
     * @var ?string
     */
    private $email;

    /**
     * The user’s timezone.
     *
     * @var ?string
     */
    private $timezone;

    /**
     * Whether the user should be automatically added to future projects.
     *
     * @var ?bool
     */
    private $hasAccessToAllFutureProjects;

    /**
     * Whether the user is a contractor or an employee.
     *
     * @var ?bool
     */
    private $isContractor;

    /**
     * Whether the user has Admin permissions.
     *
     * @var ?bool
     */
    private $isAdmin;

    /**
     * Whether the user has Project Manager permissions.
     *
     * @var ?bool
     */
    private $isProjectManager;

    /**
     * Whether the user can see billable rates on projects. Only applicable to Project Managers.
     *
     * @var ?bool
     */
    private $canSeeRates;

    /**
     * Whether the user can create projects. Only applicable to Project Managers.
     *
     * @var ?bool
     */
    private $canCreateProjects;

    /**
     * Whether the user can create invoices. Only applicable to Project Managers.
     *
     * @var ?bool
     */
    private $canCreateInvoices;

    /**
     * Whether the user is active or archived.
     *
     * @var ?bool
     */
    private $isActive;

    /**
     * The number of hours per week this person is available to work in seconds, in half hour increments. For example, if a person’s capacity is 35 hours, the API will return 126000 seconds.
     *
     * @var ?int
     */
    private $weeklyCapacity;

    /**
     * The billable rate to use for this user when they are added to a project.
     *
     * @var ?float
     */
    private $defaultHourlyRate;

    /**
     * The cost rate to use for this user when calculating a project’s costs vs billable amount.
     *
     * @var ?float
     */
    private $costRate;

    /**
     * The role names assigned to this person.
     *
     * @var ?StringArray
     */
    private $roles;

    /**
     * The URL to the user’s avatar image.
     *
     * @var ?string
     */
    private $avatarUrl;

    /**
     * Date and time the user was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the user was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new User instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $email = null,
        ?string $timezone = null,
        ?bool $hasAccessToAllFutureProjects = null,
        ?bool $isContractor = null,
        ?bool $isAdmin = null,
        ?bool $isProjectManager = null,
        ?bool $canSeeRates = null,
        ?bool $canCreateProjects = null,
        ?bool $canCreateInvoices = null,
        ?bool $isActive = null,
        ?int $weeklyCapacity = null,
        ?float $defaultHourlyRate = null,
        ?float $costRate = null,
        ?StringArray $roles = null,
        ?string $avatarUrl = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->timezone = $timezone;
        $this->hasAccessToAllFutureProjects = $hasAccessToAllFutureProjects;
        $this->isContractor = $isContractor;
        $this->isAdmin = $isAdmin;
        $this->isProjectManager = $isProjectManager;
        $this->canSeeRates = $canSeeRates;
        $this->canCreateProjects = $canCreateProjects;
        $this->canCreateInvoices = $canCreateInvoices;
        $this->isActive = $isActive;
        $this->weeklyCapacity = $weeklyCapacity;
        $this->defaultHourlyRate = $defaultHourlyRate;
        $this->costRate = $costRate;
        $this->roles = $roles;
        $this->avatarUrl = $avatarUrl;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function firstName() : ?string
    {
        return $this->firstName;
    }

    public function lastName() : ?string
    {
        return $this->lastName;
    }

    public function email() : ?string
    {
        return $this->email;
    }

    public function timezone() : ?string
    {
        return $this->timezone;
    }

    public function hasAccessToAllFutureProjects() : ?bool
    {
        return $this->hasAccessToAllFutureProjects;
    }

    public function isContractor() : ?bool
    {
        return $this->isContractor;
    }

    public function isAdmin() : ?bool
    {
        return $this->isAdmin;
    }

    public function isProjectManager() : ?bool
    {
        return $this->isProjectManager;
    }

    public function canSeeRates() : ?bool
    {
        return $this->canSeeRates;
    }

    public function canCreateProjects() : ?bool
    {
        return $this->canCreateProjects;
    }

    public function canCreateInvoices() : ?bool
    {
        return $this->canCreateInvoices;
    }

    public function isActive() : ?bool
    {
        return $this->isActive;
    }

    public function weeklyCapacity() : ?int
    {
        return $this->weeklyCapacity;
    }

    public function defaultHourlyRate() : ?float
    {
        return $this->defaultHourlyRate;
    }

    public function costRate() : ?float
    {
        return $this->costRate;
    }

    public function roles() : ?StringArray
    {
        return $this->roles;
    }

    public function avatarUrl() : ?string
    {
        return $this->avatarUrl;
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
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'timezone' => $this->timezone,
            'has_access_to_all_future_projects' => $this->hasAccessToAllFutureProjects,
            'is_contractor' => $this->isContractor,
            'is_admin' => $this->isAdmin,
            'is_project_manager' => $this->isProjectManager,
            'can_see_rates' => $this->canSeeRates,
            'can_create_projects' => $this->canCreateProjects,
            'can_create_invoices' => $this->canCreateInvoices,
            'is_active' => $this->isActive,
            'weekly_capacity' => $this->weeklyCapacity,
            'default_hourly_rate' => $this->defaultHourlyRate,
            'cost_rate' => $this->costRate,
            'roles' => $this->roles,
            'avatar_url' => $this->avatarUrl,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['timezone'],
            $data['has_access_to_all_future_projects'],
            $data['is_contractor'],
            $data['is_admin'],
            $data['is_project_manager'],
            $data['can_see_rates'],
            $data['can_create_projects'],
            $data['can_create_invoices'],
            $data['is_active'],
            $data['weekly_capacity'],
            $data['default_hourly_rate'],
            $data['cost_rate'],
            $data['roles'],
            $data['avatar_url'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
