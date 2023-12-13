<?php

namespace AlexisConception\Github\Services;

class RepositoryPayload
{
    private ?string $name;

    private ?string $description;

    private ?string $homepage;

    private bool $private;

    private ?string $visibility;

    private bool $hasIssues;

    private bool $hasProjects;

    private bool $hasWiki;

    private bool $hasDownloads;

    private bool $isTemplate;

    private int $teamId;

    private bool $autoInit;

    private ?string $gitignoreTemplate;

    private ?string $licenseTemplate;

    private bool $allowSquashMerge;

    private bool $allowMergeCommit;

    private bool $allowRebaseMerge;

    private bool $allowAutoMerge;

    private bool $deleteBranchOnMerge;

    private bool $useSquashPrTitleAsDefault;

    private ?string $squashMergeCommitTitle;

    private ?string $squashMergeCommitMessage;

    private ?string $mergeCommitTitle;

    private ?string $mergeCommitMessage;

    private ?object $customProperties;

    public function __construct()
    {
        $this->name = null;
        $this->description = null;
        $this->homepage = null;
        $this->private = true;
        $this->visibility = null;
        $this->hasIssues = true;
        $this->hasProjects = true;
        $this->hasWiki = false;
        $this->hasDownloads = false;
        $this->isTemplate = false;
        $this->teamId = 0;
        $this->autoInit = false;
        $this->gitignoreTemplate = null;
        $this->licenseTemplate = null;
        $this->allowSquashMerge = true;
        $this->allowMergeCommit = true;
        $this->allowRebaseMerge = true;
        $this->allowAutoMerge = false;
        $this->deleteBranchOnMerge = true;
        $this->useSquashPrTitleAsDefault = false;
        $this->squashMergeCommitTitle = null;
        $this->squashMergeCommitMessage = null;
        $this->mergeCommitTitle = null;
        $this->mergeCommitMessage = null;
        $this->customProperties = null;
    }

    public function get(bool $withName = false): array
    {
        $payload = [
            'description' => $this->description,
            'homepage' => $this->homepage,
            'private' => $this->private,
            'visibility' => $this->visibility,
            'has_issues' => $this->hasIssues,
            'has_projects' => $this->hasProjects,
            'has_wiki' => $this->hasWiki,
            'has_downloads' => $this->hasDownloads,
            'is_template' => $this->isTemplate,
            'auto_init' => $this->autoInit,
            'gitignore_template' => $this->gitignoreTemplate,
            'license_template' => $this->licenseTemplate,
            'allow_squash_merge' => $this->allowSquashMerge,
            'allow_merge_commit' => $this->allowMergeCommit,
            'allow_rebase_merge' => $this->allowRebaseMerge,
            'allow_auto_merge' => $this->allowAutoMerge,
            'delete_branch_on_merge' => $this->deleteBranchOnMerge,
            'use_squash_pr_title_as_default' => $this->useSquashPrTitleAsDefault,
            'squash_merge_commit_title' => $this->squashMergeCommitTitle,
            'squash_merge_commit_message' => $this->squashMergeCommitMessage,
            'merge_commit_title' => $this->mergeCommitTitle,
            'merge_commit_message' => $this->mergeCommitMessage,
            'custom_properties' => $this->customProperties,
        ];

        if ($withName) {
            $payload['name'] = $this->name;
        }

        foreach ($payload as $key => $value) {
            if ($value === null) {
                unset($payload[$key]);
            }
        }

        return $payload;
    }

    public function setCustomProperties(object $customProperties): RepositoryPayload
    {
        $this->customProperties = $customProperties;

        return $this;
    }

    public function setMergeCommitMessage(string $mergeCommitMessage): RepositoryPayload
    {
        $this->mergeCommitMessage = $mergeCommitMessage;

        return $this;
    }

    public function setMergeCommitTitle(string $mergeCommitTitle): RepositoryPayload
    {
        $this->mergeCommitTitle = $mergeCommitTitle;

        return $this;
    }

    public function setSquashMergeCommitMessage(string $squashMergeCommitMessage): RepositoryPayload
    {
        $this->squashMergeCommitMessage = $squashMergeCommitMessage;

        return $this;
    }

    public function setSquashMergeCommitTitle(string $squashMergeCommitTitle): RepositoryPayload
    {
        $this->squashMergeCommitTitle = $squashMergeCommitTitle;

        return $this;
    }

    public function setName(string $name): RepositoryPayload
    {
        $this->name = $name;

        return $this;
    }

    public function setDescription(string $description): RepositoryPayload
    {
        $this->description = $description;

        return $this;
    }

    public function setHomepage(string $homepage): RepositoryPayload
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function setPrivate(bool $private): RepositoryPayload
    {
        $this->private = $private;

        return $this;
    }

    public function setVisibility(string $visibility): RepositoryPayload
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function setHasIssues(bool $hasIssues): RepositoryPayload
    {
        $this->hasIssues = $hasIssues;

        return $this;
    }

    public function setHasProjects(bool $hasProjects): RepositoryPayload
    {
        $this->hasProjects = $hasProjects;

        return $this;
    }

    public function setHasWiki(bool $hasWiki): RepositoryPayload
    {
        $this->hasWiki = $hasWiki;

        return $this;
    }

    public function setUseSquashPrTitleAsDefault(bool $useSquashPrTitleAsDefault): RepositoryPayload
    {
        $this->useSquashPrTitleAsDefault = $useSquashPrTitleAsDefault;

        return $this;
    }

    public function setDeleteBranchOnMerge(bool $deleteBranchOnMerge): RepositoryPayload
    {
        $this->deleteBranchOnMerge = $deleteBranchOnMerge;

        return $this;
    }

    public function setAllowAutoMerge(bool $allowAutoMerge): RepositoryPayload
    {
        $this->allowAutoMerge = $allowAutoMerge;

        return $this;
    }

    public function setAllowRebaseMerge(bool $allowRebaseMerge): RepositoryPayload
    {
        $this->allowRebaseMerge = $allowRebaseMerge;

        return $this;
    }

    public function setGitignoreTemplate(string $gitignoreTemplate): RepositoryPayload
    {
        $this->gitignoreTemplate = $gitignoreTemplate;

        return $this;
    }

    public function setLicenseTemplate(string $licenseTemplate): RepositoryPayload
    {
        $this->licenseTemplate = $licenseTemplate;

        return $this;
    }

    public function setAllowSquashMerge(bool $allowSquashMerge): RepositoryPayload
    {
        $this->allowSquashMerge = $allowSquashMerge;

        return $this;
    }

    public function setAllowMergeCommit(bool $allowMergeCommit): RepositoryPayload
    {
        $this->allowMergeCommit = $allowMergeCommit;

        return $this;
    }

    public function setAutoInit(bool $autoInit): RepositoryPayload
    {
        $this->autoInit = $autoInit;

        return $this;
    }

    public function setTeamId(int $teamId): RepositoryPayload
    {
        $this->teamId = $teamId;

        return $this;
    }

    public function setIsTemplate(bool $isTemplate): RepositoryPayload
    {
        $this->isTemplate = $isTemplate;

        return $this;
    }

    public function setHasDownloads(bool $hasDownloads): RepositoryPayload
    {
        $this->hasDownloads = $hasDownloads;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isPrivate(): bool
    {
        return $this->private;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function isTemplate(): bool
    {
        return $this->isTemplate;
    }

    public function getGitignoreTemplate(): string
    {
        return $this->gitignoreTemplate;
    }

    public function getCustomProperties(): object
    {
        return $this->customProperties;
    }

    public function getMergeCommitMessage(): string
    {
        return $this->mergeCommitMessage;
    }

    public function getMergeCommitTitle(): string
    {
        return $this->mergeCommitTitle;
    }

    public function isAllowAutoMerge(): bool
    {
        return $this->allowAutoMerge;
    }

    public function isAutoInit(): bool
    {
        return $this->autoInit;
    }

    public function isHasWiki(): bool
    {
        return $this->hasWiki;
    }

    public function isHasProjects(): bool
    {
        return $this->hasProjects;
    }

    public function isHasIssues(): bool
    {
        return $this->hasIssues;
    }

    public function getVisibility(): string
    {
        return $this->visibility;
    }

    public function isHasDownloads(): bool
    {
        return $this->hasDownloads;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getLicenseTemplate(): string
    {
        return $this->licenseTemplate;
    }

    public function isAllowSquashMerge(): bool
    {
        return $this->allowSquashMerge;
    }

    public function isAllowMergeCommit(): bool
    {
        return $this->allowMergeCommit;
    }

    public function isAllowRebaseMerge(): bool
    {
        return $this->allowRebaseMerge;
    }

    public function getSquashMergeCommitMessage(): string
    {
        return $this->squashMergeCommitMessage;
    }

    public function isUseSquashPrTitleAsDefault(): bool
    {
        return $this->useSquashPrTitleAsDefault;
    }

    public function isDeleteBranchOnMerge(): bool
    {
        return $this->deleteBranchOnMerge;
    }

    public function getSquashMergeCommitTitle(): string
    {
        return $this->squashMergeCommitTitle;
    }
}
