<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Related;

use Amesplash\HarvestApi\Foundation\State\Immutable;

class Receipt extends Immutable
{
    /** @var ?string */
    private $url;

    /** @var ?string */
    private $fileName;

    /** @var ?int */
    private $fileSize;

    /** @var ?string */
    private $contentType;

    /**
     * Creates a new Receipt instance.
     */
    public function __construct(
        ?string $url = null,
        ?string $fileName = null,
        ?int $fileSize = null,
        ?string $contentType = null
    ) {
        $this->url = $url;
        $this->fileName = $fileName;
        $this->fileSize = $fileSize;
        $this->contentType = $contentType;

        parent::__construct();
    }

    public function url() : ?string
    {
        return $this->url;
    }

    public function fileName() : ?string
    {
        return $this->fileName;
    }

    public function fileSize() : ?int
    {
        return $this->fileSize;
    }

    public function contentType() : ?string
    {
        return $this->contentType;
    }

    public function arrayCopy() : array
    {
        return [
            'url' => $this->url,
            'file_name' => $this->fileName,
            'file_size' => $this->fileSize,
            'content_type' => $this->contentType,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['url'],
            $data['file_name'],
            $data['file_size'],
            $data['content_type']
        );
    }
}
