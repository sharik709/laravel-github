<?php
namespace LaravelGithub\Test;

use GitHubSimpleRepo;
use LaravelGithub\AbstractGithubApi;
use Mockery;
use stdClass;
use Tests\TestCase;

class AbstractGithubApiTest extends TestCase
{
    /** @var AbstractGithubApi */
    protected $api;

    protected function setUp():void
    {
        parent::setUp();
        $this->api = $this->getMockForAbstractClass(AbstractGithubApi::class);
    }

    public function test_if_repository_is_set()
    {
        $repo = Mockery::spy(GitHubSimpleRepo::class);
        $this->api->setRepository($repo);
        $this->assertEquals($repo, $this->api->repository);
    }


}
