<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'location:get {location}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to get locations from 4zida API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $location = $this->argument('location');

        $url = 'https://api.4zida.rs/v6/autocomplete?q='.$location;
        $response = Http::get($url);

        $data = json_decode($response->body(), true);
        $this->line(json_encode($data, JSON_PRETTY_PRINT));
    }
}
