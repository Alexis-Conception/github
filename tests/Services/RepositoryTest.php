<?php

use AlexisConception\Github\Dto\Repository as RepositoryData;
use AlexisConception\Github\Services\Repository;

describe('Repository', tests: function () {
    it('will not use debugging functions')
        ->expect(['dd', 'dump', 'ray'])
        ->each->not->toBeUsed();

    it('trying to do something without configure the github token throws an GithubTokenNotSet exception', function () {
        config(['github.token' => null]);
        Repository::all();
    })->throws(\AlexisConception\Github\Exceptions\GithubTokenNotSetException::class);

    describe('GitHub token set', function () {
        it('can get all repositories', function () {
            $repositories = Repository::all();
            \PHPUnit\Framework\assertIsArray($repositories);
            foreach ($repositories as $repository) {
                \PHPUnit\Framework\assertInstanceOf(RepositoryData::class, $repository);
            }
        });

        it('can get a repository', function () {
            $repositories = Repository::all();
            \PHPUnit\Framework\assertIsArray($repositories);
            foreach ($repositories as $r) {
                $repository = Repository::show($r->name);
                \PHPUnit\Framework\assertInstanceOf(RepositoryData::class, $repository);
                \PHPUnit\Framework\assertEquals($r->name, $repository->name);
                \PHPUnit\Framework\assertEquals($r->private, $repository->private);
            }
        });

        it('can create a repository with a valid name', function () {
        });

        it('can\'t create a repository with a invalid name', function () {
        });

        it('can delete a repository', function () {
        });
    });
});
