<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Sistem Cek Kandang Ayam - Login Page">
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
    <title>SiCekam</title>
    @vite(['resources/css/app.css', 'resources/js/login.js'])
</head>

<body class="flex items-center justify-center min-h-screen bg-no-repeat bg-cover bg-center bg-fixed"
    style="background-image: url('{{ Vite::asset('resources/images/kandang.png') }}')">
    <div class="absolute inset-0 bg-black/30 backdrop-blur-sm" aria-hidden="true"></div>

    <a href="{{ route('user.dashboard') }}" class="absolute top-6 left-6 z-20 flex items-center justify-center w-10 h-10 bg-white/10 backdrop-blur-lg rounded-full border border-white/20 shadow-lg transition-all hover:bg-white/20" aria-label="Kembali ke halaman utama">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
        </svg>
    </a>

    <!-- Login Card -->
    <div class="relative z-10 w-full max-w-md mx-4">
        <div
            class="relative bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 overflow-hidden shadow-2xl">
            <div class="p-8">
                <header class="flex flex-col items-center mb-8">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-[#713fe5] to-[#4361ee] flex items-center justify-center mb-4 shadow-lg"
                        aria-hidden="true">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="SiCekam Logo" class="h-12 w-auto"
                            loading="eager" />
                    </div>
                    <h1 class="text-2xl font-bold text-white">Sign In</h1>
                </header>

                {{-- Alert Login --}}
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-500/20 text-red-200 border border-red-400 rounded-lg">
                        @foreach ($errors->all() as $error)
                            <p class="text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-500/20 text-green-200 border border-green-400 rounded-lg">
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                @endif
                <form class="space-y-5" action="{{ route('login') }}" method="POST" autocomplete="on">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-white/70" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" required autocomplete="email"
                                class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-[#4361ee]/50 focus:border-[#4361ee]/50 transition"
                                placeholder="Masukkan Email" aria-required="true">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-white mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-white/70" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <input id="password" name="password" type="password" required
                                autocomplete="current-password"
                                class="w-full pl-10 pr-11 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-[#4361ee]/50 focus:border-[#4361ee]/50 transition"
                                placeholder="Password" aria-required="true">

                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                aria-label="Toggle password visibility">
                                <svg id="eyeIcon" class="h-5 w-5 text-white/50 hover:text-white transition"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M3.98 8.223A10.97 10.97 0 001.458 10C2.732 14.057 6.522 17 11 17c1.392 0 2.716-.262 3.924-.736l-1.625-1.625A4.978 4.978 0 0111 15a5 5 0 01-5-5c0-.872.223-1.69.615-2.403L3.98 8.223z" />
                                    <path d="M19.293 19.293l-16-16 1.414-1.414 16 16-1.414 1.414z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-br from-[#713fe5] to-[#4361ee] bg-fixed hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#713fe5]/50 transition-all duration-300">
                        Sign In
                    </button>
                </form>

                <footer class="mt-6 text-center text-sm text-white/80">
                    Belum punya akun? <a href="{{ 'register' }}"
                        class="font-medium text-white hover:text-white/80 transition hover:underline focus:outline-none focus:underline">Registrasi</a>
                </footer>
            </div>
        </div>
    </div>

</body>

</html>
