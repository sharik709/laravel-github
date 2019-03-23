<?php
namespace LaravelGithub\Test\lib;

use GitHubClient;
use LaravelGithub\lib\Repository;
use Tests\TestCase;

class RepositoryTest extends TestCase
{
    protected $repository;

    protected function setUp():void
    {
        parent::setUp();
        $this->repository = new Repository(new GitHubClient());
    }

    public function test_if_all_repository_are_listed()
    {
        $list = $this->repository->list();
        dd($list);
    }


}