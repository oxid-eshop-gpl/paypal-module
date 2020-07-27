<?php

namespace OxidProfessionalServices\PayPal\Api;

use GuzzleHttp\Exception\BadResponseException;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use Psr\Http\Message\ResponseInterface;

class BaseService
{
    /** @var Client */
    public $client;

    /**
     * @param $client Client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $method string
     * @param $fullPath string
     * @param $headers array<string,string>
     * @param $body string
     * @return ResponseInterface
     * @throws ApiException
     * @throws \Throwable
     */
    public function send($method, $path, $headers, $body): ResponseInterface
    {
        $fullPath = $this->basePath . $path;
        $request = $this->client->createRequest($method, $fullPath, $headers, $body);
        try {
            $response = $this->client->send($request);
        } catch (BadResponseException $e) {
            throw new ApiException($e);
        }
        return $response;
    }
}
