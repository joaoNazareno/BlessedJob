<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JoobleService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('JOOBLE_API_KEY');
    }

    public function searchJobs($params)
    {
        $url = 'https://jooble.org/api/' . $this->apiKey;

        $response = Http::post($url, [
            'keywords' => $params['title'] ?? '',
            'location' => $params['location'] ?? '', // Você pode remover o parâmetro de localização se desejar simplificar.
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }
}
