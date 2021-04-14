<?php


namespace Tests\Support;


use App\Http\Clients\IssuesClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

trait WorkWithIssuesClient
{
    public function swapIssuesClient(): MockHandler
    {
        $mockHandler = new MockHandler();

        $client = new IssuesClient([
            'handler' => HandlerStack::create($mockHandler),
        ]);

        $this->app->instance(IssuesClient::class, $client);

        return $mockHandler;
    }

    public function mockSingleIssueResponse(): Response
    {
        return new Response(200, [], json_encode([[
            'title' => 'Mocked title',
            'body' => 'Mocked Body',
            'state' => 'open',
            'created_at' => '2021-04-13T14:57:35Z',
            'updated_at' => '2021-04-13T14:57:35Z',
            ]]));
    }
}
