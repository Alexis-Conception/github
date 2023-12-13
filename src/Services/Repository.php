<?php

namespace AlexisConception\Github\Services;

use AlexisConception\Github\Dto\Repository as RepositoryData;
use AlexisConception\Github\Exceptions\RepositoryAlreadyExistsException;
use AlexisConception\Github\Exceptions\RepositoryDoesNotExistException;
use AlexisConception\Github\Exceptions\RepositoryNameNotProvidedException;
use AlexisConception\Github\HttpClient\Request;
use GuzzleHttp\Exception\GuzzleException;
use Throwable;

class Repository
{
    /**
     * @return RepositoryData[]
     *
     * @throws GuzzleException
     * @throws Throwable
     */
    public static function list(): array
    {
        $repositories = Request::make('GET', 'orgs/'.config('github.organization').'/repos');

        return array_map(function ($repository) {
            return RepositoryData::create($repository);
        }, $repositories);
    }

    public static function exists(string $name): bool
    {
        try {
            $repositories = self::all();
            foreach ($repositories as $repository) {
                if ($repository->name === self::formatRepositoryName($name)) {
                    return true;
                }
            }
        } catch (Throwable $exception) {
            return false;
        }

        return false;
    }

    /**
     * @return RepositoryData[]
     *
     * @throws GuzzleException
     * @throws Throwable
     */
    public static function all(): array
    {
        return self::list();
    }

    /**
     * @throws GuzzleException
     * @throws RepositoryDoesNotExistException
     * @throws Throwable
     */
    public static function show(string $name): RepositoryData
    {
        self::ensureRepositoryNameGiven($name);

        $name = self::formatRepositoryName($name);

        self::ensureRepositoryExists($name);

        return RepositoryData::create(
            Request::make('GET', 'repos/'.config('github.organization').'/'.$name)
        );
    }

    /**
     * @throws GuzzleException
     * @throws RepositoryDoesNotExistException
     * @throws Throwable
     */
    public static function get(string $name): RepositoryData
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

        return Request::make('DELETE', 'repos/'.config('github.organization').'/'.$name);
    }

    /**
     * @throws GuzzleException
     * @throws RepositoryAlreadyExistsException
     * @throws Throwable
     */
    public static function create(string $name, RepositoryPayload $payload = new RepositoryPayload()): RepositoryData
    {
        self::ensureRepositoryNameGiven($name);

        $name = self::formatRepositoryName($name);

        self::ensureRepositoryDoesNotExist($name);

        throw_if(
            ! ($payload instanceof RepositoryPayload),
            \Exception::class,
            'Payload must be an instance of '.RepositoryPayload::class
        );

        return RepositoryData::create(
            Request::make(
                'POST',
                'orgs/'.config('github.organization').'/repos',
                [
                    'name' => $name,
                    ...$payload->get(),
                ]
            )
        );
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
