<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\Collection\ArrayCollection;

class TaskAssignments extends ArrayCollection
{
    /**
     * Creates a new Task Assignments instance.
     */
    public function __construct(TaskAssignment ...$taskAssignment)
    {
        parent::__construct($taskAssignment);
    }
}
