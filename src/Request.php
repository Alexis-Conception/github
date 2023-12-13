<?php

namespace AlexisConception\Github;

use AlexisConception\Github\Exceptions\RepositoryAlreadyExistsException;
use AlexisConception\Github\Exceptions\GithubTokenNotSetException;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Throwable;

class Request
{
    const API_VERSION = '2022-11-28';
    const BASE_URI = 'https://api.github.com/';
    const HEADER_ACCEPT = 'application/vnd.github+json';
    const CONTENT_TYPE = 'application/json';
    const AUTH_METHOD = 'Bearer';

    /**
     * @throws GuzzleException
     * @throws Throwable
     */
    public static function make(string $method, string $url, array $payload = []): mixed
    {
        return json_decode((new Request())->create($method, $url, $payload), true);
    }

    /**
     * @throws GuzzleException
     * @throws Throwable
     */
    private function create(string $method, string $url, array $payload = []): string
    {
        self::ensureTokenHasBeenSet();
        return self::send($method, $url, $payload);
    }

    /**
     * @throws GuzzleException
     * @throws Throwable
     */
    private static function send(string $method, string $url, ?array $payload = null): string
    {
        $client = new Client([
            'base_uri' => self::BASE_URI,
        ]);

        $options = [
            "headers" => [
                "Authorization" => self::AUTH_METHOD . ' ' . config('github.token'),
                "Accept" => self::HEADER_ACCEPT,
                "X-GitHub-Api-Version" => self::API_VERSION,
                "Content-Type" => self::CONTENT_TYPE
            ]
        ];

        if ($payload !== null) {
            $options['json'] = $payload;
        }

        try {
            return $client
                ->request($method, $url, $options)
                ->getBody()
                ->getContents();
        } catch (GuzzleException $exception) {
            throw_if(
                $exception->getCode() === 422,
                RepositoryAlreadyExistsException::class,
                $payload['name'] ?? explode('/', $url)[2]
            );
        }

        return '';
    }

    /**
     * @throws Throwable
     */
    private static function ensureTokenHasBeenSet(): void
    {
        throw_if(
            !config('github.token'),
            GithubTokenNotSetException::class,
        );
    }

}
