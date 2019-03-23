<?php
namespace LaravelGithub\Test;

use LaravelGithub\AbstractGithubApi;
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


}
