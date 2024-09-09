<?php

namespace App\Services;

use GuzzleHttp\Client;

class AdzunaService
{
    protected $client;
    protected $apiUrl;
    protected $apiKey;
    protected $appId;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = 'https://api.adzuna.com/v1/api/jobs';
        $this->apiKey = env('ADZUNA_API_KEY');
        $this->appId = env('ADZUNA_API_APP_ID');
    }

    public function searchJobs($params)
    {
        $response = $this->client->request('GET', "{$this->apiUrl}/br/search/1", [
            'query' => array_merge([
                'app_id' => $this->appId,
                'app_key' => $this->apiKey,
                'results_per_page' => 10,
                'what' => $params['job_title'] ?? '',
                'where' => $params['location'] ?? '',
            ]),
        ]);

        return json_decode($response->getBody(), true);
    }
}