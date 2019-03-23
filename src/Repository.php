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
        return $this->client->repos->listContributors($this->repository->getOwner()->getId(), $this->repository->getName());
    }

    /**
     * @return array
     */
    public function tags()
    {
        return $this->client->repos->listTags(config('laravelgithub.username'), $this->repository->getName());
    }

    /**
     * @return array
     */
    public function languages() : array
    {
        return $this->client->repos->listLanguages(config('laravelgithub.username'), $this->repository->getName());
    }

    /**
     * @return array
     */
    public function issues() : array
    {
        return $this->client->issues->listIssues(config('laravelgithub.username'), $this->repository->getName());
    }


}
