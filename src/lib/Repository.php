<?php
namespace LaravelGithub\lib;

use LaravelGithub\AbstractGithubApi;

class Repository extends AbstractGithubApi
{

    public function list() {
        dd($this->client->repos->listYourRepositories());
        return $this->client->listYourRepositories();
    }



}
