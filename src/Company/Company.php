<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Company;

use Amesplash\HarvestApi\Foundation\Entity;

final class Company extends Entity
{
    /**
     * The Harvest URL for the company.
     *
     * @var ?string
     */
    private $baseUri;

    /**
     * The Harvest domain for the company.
     *
     * @var ?string
     */
    private $fullDomain;

    /**
     * The name of the company.
     *
     * @var ?string
     */
    private $name;

    /**
     * Whether the company is active or archived.
     *
     * @var ?bool
     */
    private $isActive;

    /**
     * The week day used as the start of the week. Returns one of: Saturday, Sunday, or Monday.
     *
     * @var ?string
     */
    private $weekStartDay;

    /**
     * Whether time is tracked via duration or start and end times.
     *
     * @var ?bool
     */
    private $wantsTimestampTimers;

    /**
     * The format used to display time in Harvest. Returns either decimal or hoursMinutes.
     *
     * @var ?string
     */
    private $timeFormat;

    /**
     * The type of plan the company is on. Examples: trial, free, or simple-v4
     *
     * @var ?string
     */
    private $planType;

    /**
     * Used to represent whether the company is using a 12-hour or 24-hour clock. Returns either 12h or 24h.
     *
     * @var ?string
     */
    private $clock;

    /**
     * Symbol used when formatting decimals.
     *
     * @var ?string
     */
    private $decimalSymbol;

    /**
     * Separator used when formatting numbers.
     *
     * @var ?string
     */
    private $thousandsSeparator;

    /**
     * The color scheme being used in the Harvest web client.
     *
     * @var ?string
     */
    private $colorScheme;

    /**
     * The weekly capacity in seconds.
     *
     * @var ?int
     */
    private $weeklyCapacity;

    /**
     * Whether the expense module is enabled.
     *
     * @var ?bool
     */
    private $expenseFeature;

    /**
     * Whether the invoice module is enabled.
     *
     * @var ?bool
     */
    private $invoiceFeature;

    /**
     * Whether the estimate module is enabled.
     *
     * @var ?bool
     */
    private $estimateFeature;

    /**
     * Whether the approval module is enabled.
     *
     * @var ?bool
     */
    private $approvalFeature;

    /**
     * Creates a new Company instance.
     */
    public function __construct(
        ?string $baseUri = null,
        ?string $fullDomain = null,
        ?string $name = null,
        ?bool $isActive = null,
        ?string $weekStartDay = null,
        ?bool $wantsTimestampTimers = null,
        ?string $timeFormat = null,
        ?string $planType = null,
        ?string $clock = null,
        ?string $decimalSymbol = null,
        ?string $thousandsSeparator = null,
        ?string $colorScheme = null,
        ?int $weeklyCapacity = null,
        ?bool $expenseFeature = null,
        ?bool $invoiceFeature = null,
        ?bool $estimateFeature = null,
        ?bool $approvalFeature = null
    ) {
        $this->baseUri = $baseUri;
        $this->fullDomain = $fullDomain;
        $this->name = $name;
        $this->isActive = $isActive;
        $this->weekStartDay = $weekStartDay;
        $this->wantsTimestampTimers = $wantsTimestampTimers;
        $this->timeFormat = $timeFormat;
        $this->planType = $planType;
        $this->clock = $clock;
        $this->decimalSymbol = $decimalSymbol;
        $this->thousandsSeparator = $thousandsSeparator;
        $this->colorScheme = $colorScheme;
        $this->weeklyCapacity = $weeklyCapacity;
        $this->expenseFeature = $expenseFeature;
        $this->invoiceFeature = $invoiceFeature;
        $this->estimateFeature = $estimateFeature;
        $this->approvalFeature = $approvalFeature;

        parent::__construct();
    }

    public function baseUri() : ?string
    {
        return $this->baseUri;
    }

    public function fullDomain() : ?string
    {
        return $this->fullDomain;
    }

    public function name() : ?string
    {
        return $this->name;
    }

    public function isActive() : ?bool
    {
        return $this->isActive;
    }

    public function weekStartDay() : ?string
    {
        return $this->weekStartDay;
    }

    public function wantsTimestampTimers() : ?bool
    {
        return $this->wantsTimestampTimers;
    }

    public function timeFormat() : ?string
    {
        return $this->timeFormat;
    }

    public function planType() : ?string
    {
        return $this->planType;
    }

    public function clock() : ?string
    {
        return $this->clock;
    }

    public function decimalSymbol() : ?string
    {
        return $this->decimalSymbol;
    }

    public function thousandsSeparator() : ?string
    {
        return $this->thousandsSeparator;
    }

    public function colorScheme() : ?string
    {
        return $this->colorScheme;
    }

    public function weeklyCapacity() : ?int
    {
        return $this->weeklyCapacity;
    }

    public function expenseFeature() : ?bool
    {
        return $this->expenseFeature;
    }

    public function invoiceFeature() : ?bool
    {
        return $this->invoiceFeature;
    }

    public function estimateFeature() : ?bool
    {
        return $this->estimateFeature;
    }

    public function approvalFeature() : ?bool
    {
        return $this->approvalFeature;
    }

    public function arrayCopy() : array
    {
        return [
            'base_uri' => $this->baseUri,
            'full_domain' => $this->fullDomain,
            'name' => $this->name,
            'is_active' => $this->isActive,
            'week_start_day' => $this->weekStartDay,
            'wants_timestamp_timers' => $this->wantsTimestampTimers,
            'time_format' => $this->timeFormat,
            'plan_type' => $this->planType,
            'clock' => $this->clock,
            'decimal_symbol' => $this->decimalSymbol,
            'thousands_separator' => $this->thousandsSeparator,
            'color_scheme' => $this->colorScheme,
            'weekly_capacity' => $this->weeklyCapacity,
            'expense_feature' => $this->expenseFeature,
            'invoice_feature' => $this->invoiceFeature,
            'estimate_feature' => $this->estimateFeature,
            'approval_feature' => $this->approvalFeature,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['base_uri'],
            $data['full_domain'],
            $data['name'],
            $data['is_active'],
            $data['week_start_day'],
            $data['wants_timestamp_timers'],
            $data['time_format'],
            $data['plan_type'],
            $data['clock'],
            $data['decimal_symbol'],
            $data['thousands_separator'],
            $data['color_scheme'],
            $data['weekly_capacity'],
            $data['expense_feature'],
            $data['invoice_feature'],
            $data['estimate_feature'],
            $data['approval_feature']
        );
    }
}
