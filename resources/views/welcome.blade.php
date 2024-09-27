<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlessedJob</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        #background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .logo-container {
            text-align: center;
            margin-top: 1vh;
        }

        .logo-container img {
            display: block;
            margin: 0 auto;
            max-width: 500px;
            min-width: 300px;
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .btn-login,
        .btn-register {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-login:hover,
        .btn-register:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-login {
            background-color: #fefeff;
            color: rgb(211, 211, 211);
        }

        .btn-register {
            background-color: #ffffff;
            color: rgb(218, 214, 214);
        }

        .search-button-container {
            text-align: center;
            margin-top: -70px;
            margin-right: ;
        }

        .search-btn {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            border-radius: 25px;
            padding: 8px 15px;
            color: #2c2c2c;
            border: none;
            transition: background-color 0.3s ease;
            width: fit-content;
            margin: 0 auto;
        }

        .search-btn:hover {
            background-color: #cecece;
        }

        .send {
            fill: rgba(0, 180, 222, 1);
            margin-left: 340px;
        }


        @media (max-width: 992px) {
            .navbar-collapse {
                justify-content: center;
                margin-top: 10px;
            }

            .btn-login,
            .btn-register {
                display: block;
                margin-bottom: 10px;
            }

            .send {
                fill: rgba(0, 180, 222, 1);
                margin-left: 240px;
            }

        }

        @media (max-width: 768px) {
            .logo-container {
                margin-top: 10vh;
            }

            .logo-container img {
                max-width: 350px;
            }

            .search-btn {
                padding: 10px 20px;
            }

            .send {
                fill: rgba(0, 180, 222, 1);
                margin-left: 10px;
            }

        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <video id="background" src="{{ asset('img/ceu_blessedjob.mp4') }}" autoplay loop muted></video>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-transparent">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if (Route::has('login'))
                        <div class="ms-auto d-flex align-items-center">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-link">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-login me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" class="fill-current text-white me-1">
                                        <path
                                            d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z">
                                        </path>
                                    </svg>
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-register">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" class="fill-current text-white me-1">
                                            <path
                                                d="M21 5c0-1.103-.897-2-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5zM5 19V5h14l.002 14H5z">
                                            </path>
                                            <path
                                                d="M7 7h1.998v2H7zm4 0h6v2h-6zm-4 4h1.998v2H7zm4 0h6v2h-6zm-4 4h1.998v2H7zm4 0h6v2h-6z">
                                            </path>
                                        </svg>
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <div class="logo-container">
            <img src="{{ asset('img/blessedjob.png') }}" alt="Blessed Job Logo" class="img-fluid">
        </div>

        <div class="search-button-container">
            <button onclick="window.location.href='{{ route('login') }}'" class="search-btn">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22"
                    viewBox="0 0 48 48" class="search-icon" style=" margin-right: 13px;">
                    <path fill="#616161" d="M34.6 28.1H38.6V45.1H34.6z" transform="rotate(-45.001 36.586 36.587)">
                    </path>
                    <path fill="#616161" d="M20 4A16 16 0 1 0 20 36A16 16 0 1 0 20 4Z"></path>
                    <path fill="#37474F" d="M36.2 32.1H40.2V44.400000000000006H36.2z"
                        transform="rotate(-45.001 38.24 38.24)"></path>
                    <path fill="#64B5F6" d="M20 7A13 13 0 1 0 20 33A13 13 0 1 0 20 7Z"></path>
                    <path fill="#BBDEFB"
                        d="M26.9,14.2c-1.7-2-4.2-3.2-6.9-3.2s-5.2,1.2-6.9,3.2c-0.4,0.4-0.3,1.1,0.1,1.4c0.4,0.4,1.1,0.3,1.4-0.1C16,13.9,17.9,13,20,13s4,0.9,5.4,2.5c0.2,0.2,0.5,0.4,0.8,0.4c0.2,0,0.5-0.1,0.6-0.2C27.2,15.3,27.2,14.6,26.9,14.2z">
                    </path>
                </svg>
                Pesquise seu BlessedJob aqui!
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        class="search-icon send">
                        <path
                            d="m21.426 11.095-17-8A1 1 0 0 0 3.03 4.242l1.212 4.849L12 12l-7.758 2.909-1.212 4.849a.998.998 0 0 0 1.396 1.147l17-8a1 1 0 0 0 0-1.81z">
                        </path>
                    </svg>
            </button>
        </div>


        <div class="footer">
            <p>&copy; 2024 BlessedJob, inc.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
