<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Foundation;

use Amesplash\HarvestApi\Foundation\Contract\HttpFactory as HttpContract;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

final class HttpFactory implements HttpContract
{
    /** @var RequestFactoryInterface */
    private $requestFactory;

    /** @var ResponseFactoryInterface */
    private $responseFactory;

    /** @var StreamFactoryInterface */
    private $streamFactory;

    /** @var UriFactoryInterface */
    private $uriFactory;

    public function __construct(
        RequestFactoryInterface $requestFactory,
        ResponseFactoryInterface $responseFactory,
        StreamFactoryInterface $streamFactory,
        UriFactoryInterface $uriFactory
    ) {
        $this->requestFactory = $requestFactory;
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
        $this->uriFactory = $uriFactory;
    }

    /**
     * @param UriInterface|string $uri
     */
    public function createRequest(string $method, $uri) : RequestInterface
    {
        return $this->requestFactory->createRequest($method, $uri);
    }

    public function createResponse(
        int $code = 200,
        string $reasonPhrase = ''
    ) : ResponseInterface {
        return $this->responseFactory->createResponse($code, $reasonPhrase);
    }

    public function createStream(string $content = '') : StreamInterface
    {
        return $this->streamFactory->createStream($content);
    }

    public function createStreamFromFile(
        string $filename,
        string $mode = 'r'
    ) : StreamInterface {
        return $this->streamFactory->createStreamFromFile($filename, $mode);
    }

    /**
     * @param resource $resource
     */
    public function createStreamFromResource($resource) : StreamInterface
    {
        return $this->streamFactory->createStreamFromResource($resource);
    }

    public function createUri(string $uri = '') : UriInterface
    {
        return $this->uriFactory->createUri($uri);
    }
}
