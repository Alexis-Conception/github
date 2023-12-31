<?php

namespace AlexisConception\Github\Dto;

use Spatie\LaravelData\Data;

class Repository extends Data implements DataTransferObjectInterface
{
    public function __construct(
        public ?int $id,
        public ?string $nodeId,
        public ?string $name,
        public ?string $fullName,
        public ?bool $private,
        public Owner $owner,
        public ?string $htmlUrl,
        public ?string $description,
        public ?bool $fork,
        public ?string $url,
        public ?string $forksUrl,
        public ?string $keysUrl,
        public ?string $collaboratorsUrl,
        public ?string $teamsUrl,
        public ?string $hooksUrl,
        public ?string $issueEventsUrl,
        public ?string $eventsUrl,
        public ?string $assigneesUrl,
        public ?string $branchesUrl,
        public ?string $tagsUrl,
        public ?string $blobsUrl,
        public ?string $gitTagsUrl,
        public ?string $gitRefsUrl,
        public ?string $treesUrl,
        public ?string $statusesUrl,
        public ?string $languagesUrl,
        public ?string $stargazersUrl,
        public ?string $contributorsUrl,
        public ?string $subscribersUrl,
        public ?string $subscriptionUrl,
        public ?string $commitsUrl,
        public ?string $gitCommitsUrl,
        public ?string $commentsUrl,
        public ?string $issueCommentUrl,
        public ?string $contentsUrl,
        public ?string $compareUrl,
        public ?string $mergesUrl,
        public ?string $archiveUrl,
        public ?string $downloadsUrl,
        public ?string $issuesUrl,
        public ?string $pullsUrl,
        public ?string $milestonesUrl,
        public ?string $notificationsUrl,
        public ?string $labelsUrl,
        public ?string $releasesUrl,
        public ?string $deploymentsUrl,
        public ?string $createdAt,
        public ?string $updatedAt,
        public ?string $pushedAt,
        public ?string $gitUrl,
        public ?string $sshUrl,
        public ?string $cloneUrl,
        public ?string $svnUrl,
        public ?string $homepage,
        public ?int $size,
        public ?int $stargazersCount,
        public ?int $watchersCount,
        public ?string $language,
        public ?bool $hasIssues,
        public ?bool $hasProjects,
        public ?bool $hasDownloads,
        public ?bool $hasWiki,
        public ?bool $hasPages,
        public ?int $forksCount,
        public ?string $mirrorUrl,
        public ?bool $archived,
        public ?bool $disabled,
        public ?int $openIssuesCount,
        public License $license,
        public ?bool $allowForking,
        public ?string $visibility,
        public ?string $forks,
        public ?string $openIssues,
        public ?string $watchers,
        public ?string $defaultBranch,
        public ?Permissions $permissions,
        public ?bool $allowSquashMerge,
        public ?bool $allowMergeCommit,
        public ?bool $allowRebaseMerge,
        public ?bool $deleteBranchOnMerge,
        public ?int $allowUpdateBranch,
        public ?bool $useSquashPrTitleAsDefault,
        public ?string $squashMergeCommitMessage,
        public ?string $squashMergeCommitTitle,
        public ?string $mergeCommitMessage,
        public ?string $mergeCommitTitle,
        public Organization $organization,
        public ?int $networkCount,
        public ?int $subscribersCount,
        public SecurityAndAnalysis $securityAndAnalysis
    ) {
    }

    public static function create(?array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            nodeId: $data['node_id'] ?? null,
            name: $data['name'] ?? null,
            fullName: $data['full_name'] ?? null,
            private: $data['private'] ?? null,
            owner: Owner::create($data['owner'] ?? null),
            htmlUrl: $data['html_url'] ?? null,
            description: $data['description'] ?? null,
            fork: $data['fork'] ?? null,
            url: $data['url'] ?? null,
            forksUrl: $data['forks_url'] ?? null,
            keysUrl: $data['keys_url'] ?? null,
            collaboratorsUrl: $data['collaborators_url'] ?? null,
            teamsUrl: $data['teams_url'] ?? null,
            hooksUrl: $data['hooks_url'] ?? null,
            issueEventsUrl: $data['issue_events_url'] ?? null,
            eventsUrl: $data['events_url'] ?? null,
            assigneesUrl: $data['assignees_url'] ?? null,
            branchesUrl: $data['branches_url'] ?? null,
            tagsUrl: $data['tags_url'] ?? null,
            blobsUrl: $data['blobs_url'] ?? null,
            gitTagsUrl: $data['git_tags_url'] ?? null,
            gitRefsUrl: $data['git_refs_url'] ?? null,
            treesUrl: $data['trees_url'] ?? null,
            statusesUrl: $data['statuses_url'] ?? null,
            languagesUrl: $data['languages_url'] ?? null,
            stargazersUrl: $data['stargazers_url'] ?? null,
            contributorsUrl: $data['contributors_url'] ?? null,
            subscribersUrl: $data['subscribers_url'] ?? null,
            subscriptionUrl: $data['subscription_url'] ?? null,
            commitsUrl: $data['commits_url'] ?? null,
            gitCommitsUrl: $data['git_commits_url'] ?? null,
            commentsUrl: $data['comments_url'] ?? null,
            issueCommentUrl: $data['issue_comment_url'] ?? null,
            contentsUrl: $data['contents_url'] ?? null,
            compareUrl: $data['compare_url'] ?? null,
            mergesUrl: $data['merges_url'] ?? null,
            archiveUrl: $data['archive_url'] ?? null,
            downloadsUrl: $data['downloads_url'] ?? null,
            issuesUrl: $data['issues_url'] ?? null,
            pullsUrl: $data['pulls_url'] ?? null,
            milestonesUrl: $data['milestones_url'] ?? null,
            notificationsUrl: $data['notifications_url'] ?? null,
            labelsUrl: $data['labels_url'] ?? null,
            releasesUrl: $data['releases_url'] ?? null,
            deploymentsUrl: $data['deployments_url'] ?? null,
            createdAt: $data['created_at'] ?? null,
            updatedAt: $data['updated_at'] ?? null,
            pushedAt: $data['pushed_at'] ?? null,
            gitUrl: $data['git_url'] ?? null,
            sshUrl: $data['ssh_url'] ?? null,
            cloneUrl: $data['clone_url'] ?? null,
            svnUrl: $data['svn_url'] ?? null,
            homepage: $data['homepage'] ?? null,
            size: $data['size'] ?? null,
            stargazersCount: $data['stargazers_count'] ?? null,
            watchersCount: $data['watchers_count'] ?? null,
            language: $data['language'] ?? null,
            hasIssues: $data['has_issues'] ?? null,
            hasProjects: $data['has_projects'] ?? null,
            hasDownloads: $data['has_downloads'] ?? null,
            hasWiki: $data['has_wiki'] ?? null,
            hasPages: $data['has_pages'] ?? null,
            forksCount: $data['forks_count'] ?? null,
            mirrorUrl: $data['mirror_url'] ?? null,
            archived: $data['archived'] ?? null,
            disabled: $data['disabled'] ?? null,
            openIssuesCount: $data['open_issues_count'] ?? null,
            license: License::create($data['license'] ?? null),
            allowForking: $data['allow_forking'] ?? null,
            visibility: $data['visibility'] ?? null,
            forks: $data['forks'] ?? null,
            openIssues: $data['open_issues'] ?? null,
            watchers: $data['watchers'] ?? null,
            defaultBranch: $data['default_branch'] ?? null,
            permissions: Permissions::create($data['permissions'] ?? null),
            allowSquashMerge: $data['allow_squash_merge'] ?? null,
            allowMergeCommit: $data['allow_merge_commit'] ?? null,
            allowRebaseMerge: $data['allow_rebase_merge'] ?? null,
            deleteBranchOnMerge: $data['delete_branch_on_merge'] ?? null,
            allowUpdateBranch: $data['allow_update_branch'] ?? null,
            useSquashPrTitleAsDefault: $data['use_squash_pr_title_as_default'] ?? null,
            squashMergeCommitMessage: $data['squash_merge_commit_message'] ?? null,
            squashMergeCommitTitle: $data['squash_merge_commit_title'] ?? null,
            mergeCommitMessage: $data['merge_commit_message'] ?? null,
            mergeCommitTitle: $data['merge_commit_title'] ?? null,
            organization: Organization::create($data['organization'] ?? null),
            networkCount: $data['network_count'] ?? null,
            subscribersCount: $data['subscribers_count'] ?? null,
            securityAndAnalysis: SecurityAndAnalysis::create($data['security_and_analysis'] ?? null)
        );
    }
}
