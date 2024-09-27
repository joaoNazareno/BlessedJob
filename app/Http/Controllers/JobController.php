<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    private function cleanDescription($description)
    {
        $description = strip_tags($description);
        $description = html_entity_decode($description);
        $description = preg_replace('/\s+/', ' ', trim($description));
        return $description;
    }

    public function pesquisa(Request $request)
    {
        $apiKey = config('services.jooble.key');
        $keywords = $request->input('job_title', '');
        $location = $request->input('location', '');
        $url = "https://br.jooble.org/api/{$apiKey}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'keywords' => $keywords,
            'location' => $location
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $serverOutput = curl_exec($ch);
        curl_close($ch);

        $jobs = json_decode($serverOutput, true);

        if (isset($jobs['jobs'])) {
            foreach ($jobs['jobs'] as &$job) {
                if (isset($job['snippet'])) {
                    $job['snippet'] = $this->cleanDescription($job['snippet']);
                }
            }
        }

        return view('dashboard', ['jobs' => $jobs]);
    }
}
