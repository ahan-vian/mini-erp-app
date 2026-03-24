<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini ERP - Smart HR & Task Management</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen flex flex-col">

    <nav class="w-full bg-white shadow-sm border-b border-gray-100 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        E
                    </div>
                    <span class="font-bold text-2xl text-gray-800 tracking-tight">Mini<span
                            class="text-blue-600">ERP</span></span>
                </div>

                <div>
                    @if (Route::has('login'))
                        <div class="flex space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 shadow-md hover:shadow-lg">
                                    Masuk ke Dashboard &rarr;
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold text-gray-700 transition-all duration-200 bg-white border border-gray-300 rounded-full hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 bg-gray-900 border border-transparent rounded-full hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 shadow-md">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 md:py-24">
        <div class="text-center max-w-4xl mx-auto">
            <div
                class="inline-flex items-center justify-center px-4 py-1.5 mb-8 text-sm font-semibold text-blue-700 bg-blue-100 rounded-full border border-blue-200">
                🚀 Versi 1.0 Resmi Dirilis!
            </div>

            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 tracking-tight mb-8 leading-tight">
                Kelola Tim & Proyek Anda <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Dalam Satu
                    Platform Pintar</span>
            </h1>

            <p class="text-lg md:text-xl text-gray-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                Tinggalkan cara lama. Mulai dari absensi harian, delegasi tugas, hingga analitik proyek tingkat
                lanjut—semuanya kini ada di ujung jari Anda. Dirancang khusus untuk perusahaan modern.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-blue-600 rounded-full hover:bg-blue-700 hover:shadow-xl hover:-translate-y-1">
                        Buka Ruang Kerja Saya
                    </a>
                @else
                    <a href="{{ route('register') }}"
                        class="px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-blue-600 rounded-full hover:bg-blue-700 hover:shadow-xl hover:-translate-y-1">
                        Mulai Gratis Sekarang
                    </a>
                    <a href="#fitur"
                        class="px-8 py-4 text-lg font-bold text-gray-700 transition-all duration-200 bg-white border-2 border-gray-200 rounded-full hover:border-gray-300 hover:bg-gray-50">
                        Pelajari Fitur
                    </a>
                @endauth
            </div>
        </div>
    </main>

    <section id="fitur" class="bg-white py-20 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Arsitektur Kelas Enterprise</h2>
                <p class="mt-4 text-gray-600">Tiga pilar utama yang membuat aplikasi kami unggul.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Smart Attendance</h3>
                    <p class="text-gray-600">Sistem Clock-In dan Clock-Out yang terekam presisi secara real-time untuk
                        memantau kedisiplinan staf Anda.</p>
                </div>

                <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:shadow-lg transition-shadow">
                    <div
                        class="w-14 h-14 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Task Management</h3>
                    <p class="text-gray-600">Delegasi tugas cerdas berbasis Role-Access. Staf dapat melaporkan progres
                        dan mengunggah bukti kerja secara aman.</p>
                </div>

                <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Analytics Dashboard</h3>
                    <p class="text-gray-600">Pusat komando visual bagi Manager untuk memantau metrik perusahaan, jumlah
                        proyek, dan tugas yang selesai.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 py-8 text-center">
        <p class="text-gray-400 text-sm">
            &copy; {{ date('Y') }} Mini ERP System. Crafted with Laravel & Tailwind CSS.
        </p>
    </footer>

</body>

</html>