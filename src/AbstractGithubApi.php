<?php
namespace LaravelGithub;

use function env;
use GitHubClient;
use Illuminate\Support\Facades\Config;

abstract class AbstractGithubApi
{
    /** @var GitHubClient|null */
    protected $client;

    public function __construct($client = null)
    {
        $this->client = $client ?? new GitHubClient();
        $this->client->setCredentials(config('laravelgithub.username'), config('laravelgithub.password'));
    }






}