<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi;

use Amesplash\HarvestApi\Foundation\Contract\HarvestHttp as HttpContract;
use Amesplash\HarvestApi\Foundation\Contract\HttpFactory;
use Amesplash\HarvestApi\Foundation\Exception\ApiRateLimitExceeded;
use Amesplash\HarvestApi\Foundation\Exception\JsonError;
use Amesplash\HarvestApi\Foundation\Exception\NotFound;
use Amesplash\HarvestApi\Foundation\Exception\RequestError;
use Amesplash\HarvestApi\Foundation\Exception\ServerError;
use Amesplash\HarvestApi\Foundation\Exception\Unauthorized;
use Psr\Http\Client\ClientInterface as HttpClient;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\UriInterface as Uri;
use function http_build_query;
use function implode;
use function json_decode;
use function json_encode;
use function json_last_error;
use function json_last_error_msg;
use const JSON_ERROR_NONE;
use const PHP_MAJOR_VERSION;
use const PHP_MINOR_VERSION;

final class HarvestHttp implements HttpContract
{
    public const VERSION = '0.1.0';

    /** @var string */
    private $apiKey;


    /** @var string */
    private $apiAccountId;

    /** @var string */
    private $baseUri = 'https://api.harvestapp.com/v2/';

    /** @var HttpClient */
    private $httpClient;

    /** @var HttpFactory */
    private $httpFactory;

    /**
     * Create new Harvest Http instance
     */
    public function __construct(
        string $apiKey,
        string $apiAccountId,
        HttpClient $httpClient,
        HttpFactory $httpFactory
    ) {
        $this->apiKey = $apiKey;
        $this->apiAccountId = $apiAccountId;
        $this->httpClient = $httpClient;
        $this->httpFactory = $httpFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function send(Request $request) : Response
    {
        $userAgent = [
            'amesplash/harvest-php-api-' . self::VERSION,
            'php/' . PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION,
        ];

        $request = $request->withHeader(
            'User-Agent',
            implode(' ', $userAgent)
        );

        $request = $request->withHeader(
            'Content-Type',
            'application/json'
        );

        $request = $request->withHeader(
            'Accept',
            'application/json'
        );

        $request = $request->withHeader(
            'Harvest-Account-Id',
            $this->apiAccountId
        );

        $request = $request->withHeader(
            'Authorization',
            'Bearer ' . $this->apiKey
        );

        return $this->checkResponse($this->httpClient->sendRequest($request));
    }

    /**
     * {@inheritdoc}
     */
    public function get(string $uri, array $params = []) : Response
    {
        $preparedUrl = $this->makeUri($uri, $params);
        $request = $this->httpFactory->createRequest('GET', $preparedUrl);

        return $this->send($request);
    }

    /**
     * {@inheritdoc}
     */
    public function post(
        string $uri,
        array $params = []
    ) : Response {
        $preparedUri = (string) $this->makeUri($uri);

        $request = $this->httpFactory->createRequest('POST', $preparedUri);

        if (! empty($params)) {
            $encodedData = $this->jsonEncodeData($params);
            $stream = $this->httpFactory->createStream($encodedData);
            $request = $request->withBody($stream);
        }

        return $this->send($request);
    }

    public function patch(
        string $uri,
        array $params = []
    ) : Response {
        $preparedUri = (string) $this->makeUri($uri);

        $request = $this->httpFactory->createRequest('PATCH', $preparedUri);

        if (! empty($params)) {
            $encodedData = $this->jsonEncodeData($params);
            $stream = $this->httpFactory->createStream($encodedData);
            $request = $request->withBody($stream);
        }

        return $this->send($request);
    }

    public function delete(
        string $uri,
        array $params = []
    ) : Response {
        $preparedUri = (string) $this->makeUri($uri);

        $request = $this->httpFactory->createRequest('DELETE', $preparedUri);

        if (! empty($params)) {
            $encodedData = $this->jsonEncodeData($params);
            $stream = $this->httpFactory->createStream($encodedData);
            $request = $request->withBody($stream);
        }

        return $this->send($request);
    }

    public function decodeResponseBody(Response $response) : array
    {
        if ($response->getBody()->isSeekable()) {
            $response->getBody()->rewind();
        }

        return $this->decodeJsonData($response->getBody()->getContents());
    }

    private function makeUri(string $uri, array $params = []) : Uri
    {
        $preparedUri = $this->httpFactory->createUri($this->baseUri . $uri);

        if (! empty($params)) {
            $preparedUri = $preparedUri->withQuery(http_build_query($params));
        }

        return $preparedUri;
    }

    private function jsonEncodeData(array $data) : string
    {
        $encodedData = (string) json_encode($data);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw JsonError::whenEncoding($data, json_last_error_msg());
        }

        return $encodedData;
    }

    private function decodeJsonData(string $jsonString) : array
    {
        $decodeData = (array) json_decode($jsonString, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw JsonError::whenDecoding($jsonString, json_last_error_msg());
        }

        return $decodeData;
    }

    private function checkResponse(Response $response) : Response
    {
        $statusCode = $response->getStatusCode();

        if ($response->getBody()->isSeekable()) {
            $response->getBody()->rewind();
        }

        $statusCodeType = (int) ($statusCode / 100);

        if ($statusCodeType === 2) {
            return $response;
        }

        $body = $this->decodeResponseBody($response);
        $errorMessage = $body['error'];

        // If it's a 5xx error, throw Server exception
        if ($statusCodeType === 5) {
            throw ServerError::withMessage($body['error'], $statusCode);
        }

        if ($statusCode === 401) {
            throw Unauthorized::attempt();
        }

        if ($statusCode === 403) {
            throw Unauthorized::request();
        }

        if ($statusCode === 404) {
            throw new NotFound();
        }

        if ($statusCode === 429) {
            throw new ApiRateLimitExceeded();
        }

        throw new RequestError($errorMessage, $statusCode);
    }
}
