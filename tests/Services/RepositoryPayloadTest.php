<?php

use AlexisConception\Github\Services\RepositoryPayload;

describe('Repository payload', tests: function () {
    it('will not use debugging functions')
        ->expect(['dd', 'dump', 'ray'])
        ->each->not->toBeUsed();

    it('can be instantiated')
        ->expect(new RepositoryPayload())
        ->toBeInstanceOf(RepositoryPayload::class);

    it('attributes can be instantiated with fluent setters', function () {
        $payload = new RepositoryPayload();
        $payload->setName('Repository Name')
            ->setDescription('Repository description')
            ->setPrivate(false)
            ->setHasIssues(true);

        \PHPUnit\Framework\assertEquals('Repository Name', $payload->getName());
        \PHPUnit\Framework\assertEquals('Repository description', $payload->getDescription());
        \PHPUnit\Framework\assertEquals(false, $payload->isPrivate());
        \PHPUnit\Framework\assertEquals(true, $payload->hasIssues());
    });

    it('can retrieve values with get method (and with the name attribute)', function () {
        $payload = new RepositoryPayload();
        $payload->setName('Repository Name');

        \PHPUnit\Framework\assertContainsEquals([
            'description' => null,
            'homepage' => null,
            'private' => true,
            'visibility' => null,
            'has_issues' => true,
            'has_projects' => true,
            'has_wiki' => false,
            'has_downloads' => false,
            'is_template' => false,
            'auto_init' => false,
            'gitignore_template' => null,
            'license_template' => null,
            'allow_squash_merge' => true,
            'allow_merge_commit' => true,
            'allow_rebase_merge' => true,
            'allow_auto_merge' => false,
            'delete_branch_on_merge' => true,
            'use_squash_pr_title_as_default' => false,
            'squash_merge_commit_title' => null,
            'squash_merge_commit_message' => null,
            'merge_commit_title' => null,
            'merge_commit_message' => null,
            'custom_properties' => null,
            'name' => $payload->getName(),
        ], $payload->get(withName: true));
    });

    it('can retrieve values with get method (and without the name attribute)', function () {
        $payload = new RepositoryPayload();

        \PHPUnit\Framework\assertContainsEquals([
            'description' => null,
            'homepage' => null,
            'private' => true,
            'visibility' => null,
            'has_issues' => true,
            'has_projects' => true,
            'has_wiki' => false,
            'has_downloads' => false,
            'is_template' => false,
            'auto_init' => false,
            'gitignore_template' => null,
            'license_template' => null,
            'allow_squash_merge' => true,
            'allow_merge_commit' => true,
            'allow_rebase_merge' => true,
            'allow_auto_merge' => false,
            'delete_branch_on_merge' => true,
            'use_squash_pr_title_as_default' => false,
            'squash_merge_commit_title' => null,
            'squash_merge_commit_message' => null,
            'merge_commit_title' => null,
            'merge_commit_message' => null,
            'custom_properties' => null,
        ], $payload->get());
    });
});
