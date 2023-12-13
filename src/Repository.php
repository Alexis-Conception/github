<?php

namespace AlexisConception\Github;

use AlexisConception\Github\Exceptions\RepositoryAlreadyExistsException;
use AlexisConception\Github\Exceptions\RepositoryDoesNotExistException;
use AlexisConception\Github\Exceptions\RepositoryNameNotProvidedException;
use GuzzleHttp\Exception\GuzzleException;
use Throwable;

class Repository
{
    /**
     * @throws GuzzleException
     * @throws Throwable
     */
    public static function list(): mixed
    {
        return Request::make('GET', 'orgs/Alexis-Conception/repos');
    }

    public static function exists(string $name): bool
    {
        try {
            $repositories = self::all();
            foreach ($repositories as $repository) {
                if ($repository['name'] === self::formatRepositoryName($name)) {
                    return true;
                }
            }
        } catch (Throwable $exception) {
            return false;
        }

        return false;
    }

    /**
     * @throws GuzzleException
     * @throws Throwable
     */
    public static function all(): mixed
    {
        return self::list();
    }

    /**
     * @throws GuzzleException
     * @throws Throwable
     */
    public static function show(string $name): mixed
    {
        self::ensureRepositoryNameGiven($name);

        $name = self::formatRepositoryName($name);

        self::ensureRepositoryExists($name);

        return Request::make('GET', 'repos/Alexis-Conception/'.$name);
    }

    /**
     * @throws GuzzleException
     * @throws Throwable
     */
    public static function get(string $name): mixed
    {
        return self::show($name);
    }

    /**
     * @throws GuzzleException
     * @throws Throwable
     */
    public static function delete(string $name): mixed
    {
        self::ensureRepositoryNameGiven($name);

        $name = self::formatRepositoryName($name);

        self::ensureRepositoryExists($name);

        return Request::make('DELETE', 'repos/Alexis-Conception/'.$name);
    }

    /**
     * @throws GuzzleException
     * @throws RepositoryAlreadyExistsException
     * @throws Throwable
     */
    public static function create(string $name, array $payload = []): mixed
    {
        self::ensureRepositoryNameGiven($name);

        $name = self::formatRepositoryName($name);

        self::ensureRepositoryDoesNotExist($name);

        return Request::make('POST', 'orgs/Alexis-Conception/repos', [
            'name' => $name,
            ...$payload,
        ]);
    }

    /**
     * @throws Throwable
     */
    private static function formatRepositoryName(string $name): string
    {
        return str_replace(' ', '-', $name);
    }

    /**
     * @throws Throwable
     */
    private static function ensureRepositoryNameGiven(?string $name): void
    {
        throw_if(
            $name === '' || $name === null,
            RepositoryNameNotProvidedException::class
        );
    }

    /**
     * @throws RepositoryDoesNotExistException
     */
    private static function ensureRepositoryExists(string $name): void
    {
        if (self::exists($name) === false) {
            throw new RepositoryDoesNotExistException($name);
        }
    }

    /**
     * @throws RepositoryAlreadyExistsException
     */
    private static function ensureRepositoryDoesNotExist(string $name): void
    {
        if (self::exists($name) === true) {
            throw new RepositoryAlreadyExistsException($name);
        }
    }
}
