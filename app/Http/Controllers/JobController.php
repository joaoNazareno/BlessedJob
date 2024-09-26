<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function pesquisa(Request $request)
    {
        // Defina sua chave da API
        $apiKey = config('services.jooble.key'); // Pega a chave da API do arquivo de configuração

        // Define os parâmetros de pesquisa
        $keywords = $request->input('job_title', ''); // O título da vaga
        $url = "https://br.jooble.org/api/{$apiKey}";

        // Cria o objeto de requisição
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'keywords' => $keywords,
            'location' => '' // Pode deixar vazio ou definir uma localização padrão
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Recebe a resposta do servidor
        $serverOutput = curl_exec($ch);
        curl_close($ch);

        // Converte a resposta JSON em um array
        $jobs = json_decode($serverOutput, true);

        // Retorna a view com os resultados
        return view('dashboard', ['jobs' => $jobs]);
    }
}
