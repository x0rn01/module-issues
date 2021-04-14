<?php

namespace App\Providers;

use App\Http\Clients\IssuesClient;
use Illuminate\Support\ServiceProvider;

class IssuesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // singleton because we want only one http client instance
        $this->app->singleton(IssuesClient::class, function() {
            $config = $this->app->get('config')['issues'];
            return new IssuesClient([
                'base_uri' => $config['base_uri'],
                'headers' => [
                    'Accept' => 'application/vnd.github.v3+json',
                    'Authorization' => $config['api_token']
                ],
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
