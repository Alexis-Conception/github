# This is my package github

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alexis-conception/github.svg?style=flat-square)](https://packagist.org/packages/alexis-conception/github)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/alexis-conception/github/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/alexis-conception/github/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/alexis-conception/github/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/alexis-conception/github/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/alexis-conception/github.svg?style=flat-square)](https://packagist.org/packages/alexis-conception/github)

This package allows you to create get, delete and create repositories into GitHub organizations.

## Installation

You can install the package via composer:

```bash
composer require alexis-conception/github
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="github-config"
```

This is the contents of the published config file:

```php
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
```

## Usage

```php
$repositories = new AlexisConception\Github\Services\Repository::all();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alexis-Conception](https://github.com/Alexis-Conception)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
