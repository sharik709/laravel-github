<?php
namespace LaravelGithub\Test;

use GitHubClient;
use GitHubSimpleRepo;
use LaravelGithub\Repositories;
use LaravelGithub\Repository;
use Mockery;

class RepositoryTest extends TestCase
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

    public function test_if_all_contributors_for_a_repository_are_returned()
    {
        $mock = $this
                    ->apiMock
                    ->shouldReceive('listContributors')
                    ->once()
                    ->andReturn([[], [], [], []])
                    ->getMock();
        $mock->repos = $mock;

        $repoMock = Mockery::mock(GitHubSimpleRepo::class)
            ->shouldReceive('getName')
            ->once()
            ->andReturn('some/name')
            ->getMock();

        $contributors = (new Repository($repoMock, $mock))->contributors();

        $this->assertIsArray($contributors);
        $this->assertCount(4, $contributors);
    }

    public function test_if_tags_are_returned_for_a_repository()
    {
        $mock = $this
            ->apiMock
            ->shouldReceive('listTags')
            ->once()
            ->andReturn([[], [], [], []])
            ->getMock();
        $mock->repos = $mock;

        $repository = new Repository([], $mock);

        $repoMock = Mockery::mock(GitHubSimpleRepo::class)
            ->shouldReceive('getName')
            ->once()
            ->andReturn('some/name')
            ->getMock();

        $repository->setRepository($repoMock);
        $tags = $repository->tags();
        $this->assertIsArray($tags);
        $this->assertCount(4, $tags);
    }

    public function test_languages_are_returned_for_a_repository ()
    {
        $mock = $this
            ->apiMock
            ->shouldReceive('listLanguages')
            ->once()
            ->andReturn([])
            ->getMock();
        $mock->repos = $mock;

        $repoMock = Mockery::mock(GitHubSimpleRepo::class)
            ->shouldReceive('getName')
            ->once()
            ->andReturn('some/name')
            ->getMock();

        $repository = new Repository($repoMock, $mock);
        $languages = $repository->languages();
        $this->assertIsArray($languages);
    }

    public function test_issues_are_returned_for_a_repository()
    {
        $mock = $this
            ->apiMock
            ->shouldReceive('listIssues')
            ->once()
            ->andReturn([])
            ->getMock();
        $mock->issues = $mock;

        $repoMock = Mockery::mock(GitHubSimpleRepo::class)
            ->shouldReceive('getName')
            ->once()
            ->andReturn('some/name')
            ->getMock();

        $repository = new Repository($repoMock, $mock);
        $issues = $repository->issues();
        $this->assertIsArray($issues);
    }

    public function test_if_pull_requests_are_returned_for_a_repository()
    {
        $mock = $this
            ->apiMock
            ->shouldReceive('listPullRequests')
            ->once()
            ->andReturn([])
            ->getMock();
        $mock->pulls = $mock;

        $repoMock = Mockery::mock(GitHubSimpleRepo::class)
            ->shouldReceive('getName')
            ->once()
            ->andReturn('some/name')
            ->getMock();

        $repository = new Repository($repoMock, $mock);
        $pulls = $repository->pullRequests();
        $this->assertIsArray($pulls);
    }

}