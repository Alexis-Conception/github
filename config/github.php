<?php

/**
 * This package works only with token authentication.
 */
return [
    /**
     * The token to use for authentication.
     */
    'token' => env('GITHUB_TOKEN'),

    /**
     * The organization to manage
     */
    'organization' => env('GITHUB_ORGANIZATION'),

    /**
     * The base url to use for the API requests.
     */
    'base_url' => env('GITHUB_BASE_URL', 'https://api.github.com/'),

    /**
     * The version of the API to use.
     */
    'version' => env('GITHUB_VERSION', 'v3'),

    /**
     * The Accept header to send.
     */
    'accept' => env('GITHUB_ACCEPT', 'application/vnd.github.v3+json'),

    /**
     * The number of seconds before timing out the request.
     */
    'timeout' => env('GITHUB_TIMEOUT', 10),

    /**
     * The number of seconds before timing out the connection.
     */
    'connection_timeout' => env('GITHUB_CONNECTION_TIMEOUT', 5),

    /**
     * The number of seconds before timing out the request while waiting for a response.
     */
    'request_timeout' => env('GITHUB_REQUEST_TIMEOUT', 3),

    /**
     * The number of seconds before timing out the request while waiting for a response to the initial connection.
     */
    'response_timeout' => env('GITHUB_RESPONSE_TIMEOUT', 3),

    /**
     * The number of seconds before timing out the request while waiting for a response to any of the requests.
     */
    'overall_timeout' => env('GITHUB_OVERALL_TIMEOUT', 10),
];
