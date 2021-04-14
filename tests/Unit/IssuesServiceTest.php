<?php


namespace Tests\Unit;


use App\Services\IssuesService;
use Tests\Support\WorkWithIssuesClient;
use Tests\TestCase;

class IssuesServiceTest extends TestCase
{
    use WorkWithIssuesClient;

    private $issuesService;
    private $mockHandler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockHandler = $this->swapIssuesClient();
        $this->issuesService = app(IssuesService::class);
    }


    /** @test */
    public function testFetchingIssues(): void
    {
        $this->mockHandler->append($this->mockSingleIssueResponse());

        $result = $this->issuesService->getIssues();

        $this->assertCount(1, $result);
        $this->assertEquals('Mocked title', $result[0]->title);
    }
}
