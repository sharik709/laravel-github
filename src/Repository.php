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

    public function listLanguages()
    {
        return $this->client->repos->listLanguages($this->repository->getOwner()->getId(), $this->repository->getName());
    }


}
