<?php

namespace App\Services;



use App\Http\Clients\IssuesClient;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class IssuesService {

    /**
     * @var IssuesClient
     */
    private $client;

    public function __construct(IssuesClient $client)
    {
        $this->client=$client;
    }

    public function create($title, $description) {
        //TODO: query params {repo} and {owner} are hardcoded at the moment, shouldn't we use a configuration settings?
        $body = json_encode([
            'title' => $title,
            'body' => $description,
            'labels' => ['UI'],
        ]);

        //TODO: should we handle response status ?
        $this->client->request('POST', '/repos/x0rn01/module-issues/issues', ['body' => $body]);
    }

    public function get(): Collection {
        //TODO: query params {repo} and {owner} are hardcoded at the moment, shouldn't we use a configuration settings?
        $response = $this->client->get('repos/x0rn01/module-issues/issues');
        $body = json_decode((string)$response->getBody(), true);

        return collect($body)->map(function($issue) {
            return [
                'title' => $issue['title'],
                'body' => $issue['body'],
                'state' => $issue['state'],
                'comment' => $issue['comments'],
                'created_at' => $issue['created_at'] !== null
                    ? Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $issue['created_at'])
                    : 'unknown',
                'updated_at' => $issue['updated_at'] !== null
                    ? Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $issue['updated_at'])
                    : 'unknown',
            ];
        });
    }
}
