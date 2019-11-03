<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

class ExternalReference extends Immutable
{
    /** @var ?int */
    private $id;

    /** @var ?int */
    private $groupId;

    /** @var ?string */
    private $permalink;

    /** @var ?string */
    private $service;

    /** @var ?string */
    private $serviceIconURL;

    /**
     * Creates a new External Reference instance.
     */
    public function __construct(
        ?int $id = null,
        ?int $groupId = null,
        ?string $permalink = null,
        ?string $service = null,
        ?string $serviceIconURL = null
    ) {
        $this->id = $id;
        $this->groupId = $groupId;
        $this->permalink = $permalink;
        $this->service = $service;
        $this->serviceIconURL = $serviceIconURL;

        parent::__construct();
    }

    public function url() : ?int
    {
        return $this->id;
    }

    public function groupId() : ?int
    {
        return $this->groupId;
    }

    public function permalink() : ?string
    {
        return $this->permalink;
    }

    public function service() : ?string
    {
        return $this->service;
    }

    public function serviceIconURL() : ?string
    {
        return $this->serviceIconURL;
    }

    public function arrayCopy() : array
    {
        return [
            'id' => $this->id,
            'group_id' => $this->groupId,
            'permalink' => $this->permalink,
            'service' => $this->service,
            'service_icon_url' => $this->serviceIconURL,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['group_id'],
            $data['permalink'],
            $data['service'],
            $data['service_icon_url']
        );
    }
}
