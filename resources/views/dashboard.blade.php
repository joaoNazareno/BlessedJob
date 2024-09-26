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
            margin-bottom: 30px;
            font-size: 24px;
            color: black;
            font-weight: bold;
        }

        .card-text {
            margin-bottom: 30px;
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
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="container mt-4">
                    <h2 class="mb-4">Pesquisar Vagas</h2>
                    <form action="{{ route('pesquisa') }}" method="GET" class="mb-4">
                        <div class="form-group">
                            <label for="job_title">Título da Vaga</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Ex: Developer">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" style="border-radius: 0 4px 4px 0;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="fill-current text-white">
                                            <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="container mt-4">
                    @if (isset($jobs['jobs']) && count($jobs['jobs']) > 0)
                        <h2 class="mb-4">Vagas 👇</h2>
                        <div class="job-results">
                            @foreach ($jobs['jobs'] as $job)
                                <div class="job-card">
                                    <h5 class="card-title">{{ $job['title'] }}</h5>
                                    <p class="card-text">{{ $job['snippet'] ?? 'Descrição não disponível' }}</p>
                                    <div class="text-center">
                                        <a href="{{ $job['link'] }}" class="btn btn-candidatar" target="_blank">Candidatar</a>
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
