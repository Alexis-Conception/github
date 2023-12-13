<?php

use AlexisConception\Github\Dto\Repository as RepositoryData;
use AlexisConception\Github\Services\Repository;

describe('Organization repositories actions without authentication', tests: function () {
    it('will not use debugging functions')
        ->expect(['dd', 'dump', 'ray'])
        ->each->not->toBeUsed();

    it('trying to do something without configure the github token throws an GithubTokenNotSet exception', function () {
        config(['github.token' => null]);
        Repository::all();
    })->throws(\AlexisConception\Github\Exceptions\GithubTokenNotSetException::class);
});

describe('Organization repositories actions with authentication', function () {
    it('can get all repositories', function () {
        if (config('github.token') && config('github.organization')) {
            $repositories = Repository::all();
            \PHPUnit\Framework\assertIsArray($repositories);
            foreach ($repositories as $repository) {
                \PHPUnit\Framework\assertInstanceOf(RepositoryData::class, $repository);
            }
        } else {
            \PHPUnit\Framework\assertEquals(true, true);
        }
    });

    it('can get a repository using show method', function () {
        if (config('github.token') && config('github.organization')) {
            $repositories = Repository::all();
            \PHPUnit\Framework\assertIsArray($repositories);
            foreach ($repositories as $r) {
                $repository = Repository::show($r->name);
                \PHPUnit\Framework\assertInstanceOf(RepositoryData::class, $repository);
                \PHPUnit\Framework\assertEquals($r->name, $repository->name);
                \PHPUnit\Framework\assertEquals($r->private, $repository->private);
            }
        } else {
            \PHPUnit\Framework\assertEquals(true, true);
        }
    });

    it('can get a repository using get method', function () {
        if (config('github.token') && config('github.organization')) {
            $repositories = Repository::all();
            \PHPUnit\Framework\assertIsArray($repositories);
            foreach ($repositories as $r) {
                $repository = Repository::get($r->name);
                \PHPUnit\Framework\assertInstanceOf(RepositoryData::class, $repository);
                \PHPUnit\Framework\assertEquals($r->name, $repository->name);
                \PHPUnit\Framework\assertEquals($r->private, $repository->private);
            }
        } else {
            \PHPUnit\Framework\assertEquals(true, true);
        }
    });

    it('can create a repository with a valid name', function () {
        if (config('github.token') && config('github.organization')) {
            $repositoryName = 'Test Repository';
            if (Repository::exists($repositoryName)) {
                Repository::delete($repositoryName);
            }
            $repository = Repository::create($repositoryName);
            \PHPUnit\Framework\assertEquals($repository, Repository::show($repositoryName));
        } else {
            \PHPUnit\Framework\assertEquals(true, true);
        }
    });

    it('can delete a repository', function () {
        if (config('github.token') && config('github.organization')) {
            $repositoryName = 'Test Repository';
            if (! Repository::exists($repositoryName)) {
                Repository::create($repositoryName);
            }
            \PHPUnit\Framework\assertEquals(true, Repository::exists($repositoryName));
            Repository::delete($repositoryName);
            \PHPUnit\Framework\assertEquals(false, Repository::exists($repositoryName));
        } else {
            \PHPUnit\Framework\assertEquals(true, true);
        }
    });
});
