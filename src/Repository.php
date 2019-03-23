<?php
namespace LaravelGithub;


use GitHubClient;
use GitHubSimpleRepo;

class Repository extends AbstractGithubApi
{
    /**
     * Repository constructor.
     * @param null $client
     * @param $repository
     */
    public function __construct($repository, $client = null)
    {
        parent::__construct($client ?? new GitHubClient());
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function contributors() : array
    {
        return $this->client->repos->listContributors($this->githubUsername, $this->repository->getName());
    }

    /**
     * @return array
     */
    public function tags()
    {
        return $this->client->repos->listTags($this->githubUsername, $this->repository->getName());
    }

    /**
     * @return array
     */
    public function languages() : array
    {
        return $this->client->repos->listLanguages($this->githubUsername, $this->repository->getName());
    }

    /**
     * @return array
     */
    public function issues() : array
    {
        return $this->client->issues->listIssues($this->githubUsername, $this->repository->getName());
    }

    /**
     * @return array
     */
    public function pullRequests() : array
    {
        return $this->client->pulls->listPullRequests($this->githubUsername, $this->repository->getName());
    }


}
