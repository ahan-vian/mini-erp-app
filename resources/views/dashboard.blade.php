<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg flex flex-col items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Absen Masuk</h3>
                            <p class="text-gray-500 mb-6">Catat waktu kedatangan anda hari ini</p>
                            <form action="{{ route('clock_in') }}" method="post">
                                @csrf
                                <button type="submit" class="w-full bg-green-500 text-white px-10 py-3 hover:bg-green-700 shadow-lg rounded-lg transition-colors">
                                    Clock In Sekarang
                                </button>
                            </form>
                        </div>

                        <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg flex flex-col items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Absen Pulang</h3>
                            <p class="text-gray-500 mb-6">Akhiri jam kerja dan catat waktu pulang anda</p>
                            <form action="{{ route('clock_out') }}" method="post">
                                @csrf
                                <button type="submit" class="w-full bg-red-500 text-white px-10 py-3 hover:bg-red-700 shadow-lg rounded-lg transition-colors">
                                    Clock In Sekarang
                                </button>
                            </form>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>