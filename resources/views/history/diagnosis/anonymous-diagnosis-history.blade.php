<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <div class="container">
                <h1>Riwayat Penyakit</h1>
                <table class="table flex justify-center space-x-4">
                    <thead>
                        <tr>
                            <th>Diagnosa</th>
                            <!-- Tambahkan kolom lain sesuai kebutuhan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnosis_history as $history)
                        <tr>
                            <td>{{ $history->diagnosis_history }}</td>
                            <!-- Tambahkan data dari kolom lain sesuai kebutuhan -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        
                <!-- Tampilkan halaman paginasi jika diperlukan -->
            </div>
        </div>
    </body>
</html>

    
