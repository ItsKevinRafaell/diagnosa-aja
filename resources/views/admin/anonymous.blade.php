<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100">
    <div class="relative flex justify-center items-center min-h-screen bg-dots-darker bg-center ">
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif

        <div class="container mx-auto p-4">
            <h1 class="ont-semibold">Daftar Anonymous</h1>
            <h1 class="text-blue-600 hover:underline mb-4"><a href="{{ route('user')}}">User</a></h1>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md ">
                    <thead>
                        <tr>
                            <th class="px-6 py-4 border-b border-gray-300">ID</th>
                            <th class="px-6 py-4 border-b border-gray-300">Nama</th>
                            <th class="px-6 py-4 border-b border-gray-300">Umur</th>
                            <th class="px-6 py-4 border-b border-gray-300">Jenis Kelamin</th>
                            <th class="px-6 py-4 border-b border-gray-300">Golongan Darah</th>
                            <th class="px-6 py-4 border-b border-gray-300">Riwayat Penyakit</th>
                            <th class="px-6 py-4 border-b border-gray-300">Riwayat Diagnosa</th>
                            <!-- Tambahkan kolom lain sesuai kebutuhan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anonymouses as $anonymous)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">{{ $anonymous->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">{{ $anonymous->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">{{ $anonymous->age }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">{{ $anonymous->gender }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">{{ $anonymous->blood_type }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                                <!-- Tautan ke halaman riwayat penyakit dengan ID pengguna sebagai parameter -->
                                <a href="{{ route('riwayat.penyakit.user', ['user_id' => $anonymous->id]) }}" class="text-blue-600 hover:underline">Riwayat Penyakit</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                                <!-- Tautan ke halaman riwayat diagnosa dengan ID pengguna sebagai parameter -->
                                <a href="{{ route('riwayat.diagnosa.user', ['user_id' => $anonymous->id]) }}" class="text-blue-600 hover:underline">Riwayat Diagnosa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tampilkan halaman paginasi -->
            <div class="mt-4">
                {{ $anonymouses->links() }}
            </div>
        </div>
    </div>
</body>
</html>
