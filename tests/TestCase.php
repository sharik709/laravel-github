<?php
namespace LaravelGithub\Test;


use GitHubRepo;
use GitHubSimpleRepo;
use GitHubUser;
use Mockery;

abstract class TestCase extends \Tests\TestCase {


    public function getRepoMock($method, $return)
    {
        return Mockery::mock(GitHubSimpleRepo::class)
            ->shouldReceive($method)
            ->once()
            ->andReturn($return)
            ->getMock();
    }

    public function getRepoOwnerMock($method, $return)
    {
        return Mockery::mock(GitHubRepo::class)
            ->shouldReceive($method)
            ->once()
            ->andReturn($return)
            ->getMock();
    }

}
