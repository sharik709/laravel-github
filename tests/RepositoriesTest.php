<?php
namespace LaravelGithub\Test;


use GitHubClient;
use Illuminate\Support\Collection;
use LaravelGithub\Repositories;
use Mockery;

class RepositoriesTest extends TestCase
{
    protected $apiMock;

    protected function setUp():void
    {
        parent::setUp();
        $this->apiMock = Mockery::mock(GitHubClient::class)
            ->shouldReceive('setCredentials')
            ->andReturnSelf()
            ->getMock();
    }

    public function test_if_all_repository_are_listed()
    {
        // mocking methods
        $mock = $this
            ->apiMock
            ->shouldReceive('listYourRepositories')
            ->once()
            ->andReturn([[], [], []])
            ->getMock();
        $mock->repos = $mock;

        $repositories = new Repositories($mock);

        $list = $repositories->list();
        $this->assertCount(3, $list);
        $this->assertIsArray($list);
    }
}
