<?php

namespace AlexisConception\Github\Dto;

class Organization
{
    public function __construct(
        public ?string $login,
        public ?int    $id,
        public ?string $nodeId,
        public ?string $avatarUrl,
        public ?string $gravatarId,
        public ?string $url,
        public ?string $htmlUrl,
        public ?string $followersUrl,
        public ?string $followingUrl,
        public ?string $gistsUrl,
        public ?string $starredUrl,
        public ?string $subscriptionsUrl,
        public ?string $organizationsUrl,
        public ?string $reposUrl,
        public ?string $eventsUrl,
        public ?string $receivedEventsUrl,
        public ?string $type,
        public ?bool   $siteAdmin
    )
    {
    }

    public static function create(?array $data): self
    {
        return new self(
            login: $data['login'] ?? null,
            id: $data['id'] ?? null,
            nodeId: $data['node_id'] ?? null,
            avatarUrl: $data['avatar_url'] ?? null,
            gravatarId: $data['gravatar_id'] ?? null,
            url: $data['url'] ?? null,
            htmlUrl: $data['html_url'] ?? null,
            followersUrl: $data['followers_url'] ?? null,
            followingUrl: $data['following_url'] ?? null,
            gistsUrl: $data['gists_url'] ?? null,
            starredUrl: $data['starred_url'] ?? null,
            subscriptionsUrl: $data['subscriptions_url'] ?? null,
            organizationsUrl: $data['organizations_url'] ?? null,
            reposUrl: $data['repos_url'] ?? null,
            eventsUrl: $data['events_url'] ?? null,
            receivedEventsUrl: $data['received_events_url'] ?? null,
            type: $data['type'] ?? null,
            siteAdmin: $data['site_admin'] ?? null
        );
    }
}
