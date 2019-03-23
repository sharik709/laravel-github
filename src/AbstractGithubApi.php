<?php
namespace LaravelGithub;

use function env;
use GitHubClient;
use GitHubSimpleRepo;
use Illuminate\Support\Facades\Config;

abstract class AbstractGithubApi
{
    /** @var GitHubClient|null */
    protected $client;

    /** @var GitHubSimpleRepo */
    public $repository;

    public $githubUsername;

    public function __construct($client = null)
    {
        $this->client = $client ?? new GitHubClient();
        $this->client->setCredentials(config('laravelgithub.username'), config('laravelgithub.password'));
        $this->githubUsername = config('laravelgithub.username');
    }

    /**
     * @param GitHubSimpleRepo $repository
     * @return $this
     */
    public function setRepository(GitHubSimpleRepo $repository) : self
    {
        $this->repository = $repository;
        return $this;
    }





}