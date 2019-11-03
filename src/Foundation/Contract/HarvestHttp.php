<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Foundation\Contract;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface HarvestHttp
{
    /**
     * Wrap the HTTP Client, creates a new PSR-7 request.
     * Adds any missing required headers.
     */
    public function send(RequestInterface $request) : ResponseInterface;

    public function get(string $uri, array $params = []) : ResponseInterface;

    public function post(string $uri, array $params = []) : ResponseInterface;

    public function patch(string $uri, array $params = []) : ResponseInterface;

    public function delete(string $uri) : ResponseInterface;

    public function decodeResponseBody(ResponseInterface $response) : array;
}
