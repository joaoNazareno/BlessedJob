<x-app-layout>
    <style>
        .job-results {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        .job-card {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            clear: both;
        }

        .card-title {
            margin-bottom: 20px;
            font-size: 24px;
            color: rgb(46, 69, 197);
            font-weight: bold;
        }

        .card-location {
            margin-bottom: 20px;
            font-size: 16px;
            color: #6c757d;
        }

        .card-text {
            margin-bottom: 23px;
            font-size: 16px;

            color: #343a40;

            line-height: 1.5;

        }

        .card-text b {
            font-weight: bold;

        }

        .card-text .description-title {
            font-weight: bold;
            margin-top: 10px;

        }

        .card-text .description-content {
            margin-top: 5px;

            margin-bottom: 10px;
        }

        .btn-candidatar {
            background-color: #007bff;
            color: white;
            border: none;
            width: 90%;
            padding: 12px;
            border-radius: 10px;
            font-size: 16px;
            margin: 10px auto;
            display: block;
        }

        .btn-candidatar:hover {
            background-color: #0056b3;
        }

        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        #background {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .job-search-container {
            background-color: rgba(248, 249, 250, 0.9);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 30px;
        }

        .job-search-container h1 {
            font-size: 28px;
            color: #343a40;
            margin-bottom: 10px;
        }

        .job-search-container p {
            color: #6c757d;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .job-search-form {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .form-input {
            width: 300px;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-input:focus {
            border-color: #007bff;
            outline: none;
        }

        .search-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #0056b3;
        }

        strong {
            color: #0056b3;
            font-size: 40px;
        }
    </style>

    <div id="video-background">
        <video id="background" src="{{ asset('img/ceu_blessedjob.mp4') }}" autoplay loop muted></video>
    </div>
    <br>
    <br>
    <br>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="job-search-container">
                    <h1><strong>Seu novo emprego! 👨‍💻</strong></h1>
                    <p>Mais de 376.800 vagas atuais em 1.240 sites disponíveis para você. Encontre seu novo emprego
                        hoje.</p>
                    <form action="{{ route('pesquisa') }}" method="GET" class="job-search-form">
                        <input type="text" class="form-input" name="job_title"
                            placeholder="Em qual cargo você deseja trabalhar?" autocomplete="off">
                        <input type="text" class="form-input" name="location" placeholder="Onde?" autocomplete="off">
                        <button type="submit" class="search-button">Achar vagas!</button>
                    </form>
                </div>

                <div class="container mt-4">
                    @if (isset($jobs['jobs']) && count($jobs['jobs']) > 0)
                        <h2 class="mb-4">futuro btn ❤ para tela de vagas favoritas.</h2>
                        <div class="job-results">
                            @foreach ($jobs['jobs'] as $job)
                                <div class="job-card">
                                    <h5 class="card-title">{{ $job['title'] }}</h5>
                                    @if (!empty($job['location']))
                                        <p class="card-location">
                                            <span style="display: flex; align-items: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(96, 94, 94, 1); transform: ; msFilter:; margin-right: 8px;">
                                                    <path
                                                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z">
                                                    </path>
                                                </svg>
                                                {{ $job['location'] }}
                                            </span>
                                        </p>
                                    @endif

                                    <p class="card-text">
                                        <span class="description-title">Sobre a vaga:</span>
                                        <span
                                            class="description-content">{{ $job['snippet'] ?? 'Descrição não disponível' }}</span>
                                    </p>

                                    <div class="text-center">
                                        <a href="{{ $job['link'] }}" class="btn btn-candidatar"
                                            target="_blank">Candidatar</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Nenhuma vaga encontrada.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
