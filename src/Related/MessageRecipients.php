<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\Collection\ArrayCollection;

class MessageRecipients extends ArrayCollection
{
    /**
     * Creates a new Message Recipients instance.
     */
    public function __construct(MessageRecipient ...$messageRecipient)
    {
        parent::__construct($messageRecipient);
    }
}
