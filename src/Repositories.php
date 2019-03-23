<?php

namespace LaravelGithub;

use Illuminate\Support\Collection;

class Repositories extends AbstractGithubApi
{
    /**
     * It will return list of all repository under given account
     * @return Collection
     */
    public function list() : array
    {
        $repos = $this->client->repos->listYourRepositories();
        return array_map(function($repository){
            return new Repository($repository, $this->client);
        }, $repos);
    }




}
