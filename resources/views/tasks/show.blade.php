<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Tugas') }}
            </h2>
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded shadow text-sm">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                
                <div class="bg-blue-50 border-b border-blue-100 p-6">
                    <h3 class="text-2xl font-bold text-gray-800">{{ $task->nama_task }}</h3>
                    <p class="text-sm text-blue-600 mt-1 font-semibold uppercase tracking-wide">Proyek: {{ $task->project->nama_project }}</p>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <h4 class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Dikerjakan Oleh</h4>
                        <p class="text-gray-800 font-medium mb-4">{{ $task->user->name }}</p>

                        <h4 class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Level / Prioritas</h4>
                        <p class="text-gray-800 font-medium mb-4 uppercase">{{ $task->level }}</p>

                        <h4 class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Deskripsi Tugas</h4>
                        <p class="text-gray-700 bg-gray-50 p-3 rounded border border-gray-200 break-words whitespace-pre-wrap">{{ $task->deskripsi }}</p>
                    </div>

                    <div>
                        <h4 class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Waktu Pelaksanaan</h4>
                        <p class="text-gray-800 mb-4">
                            Mulai: <span class="font-medium">{{ $task->tanggal_mulai }}</span><br>
                            Selesai: <span class="text-red-600 font-bold">{{ $task->tanggal_selesai }}</span>
                        </p>

                        <h4 class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Status Saat Ini</h4>
                        <div class="mb-6">
                            @if($task->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-800 py-1 px-3 rounded-full text-sm font-semibold border border-yellow-200">Pending</span>
                            @elseif($task->status == 'on_progres')
                                <span class="bg-blue-100 text-blue-800 py-1 px-3 rounded-full text-sm font-semibold border border-blue-200">On Progress</span>
                            @else
                                <span class="bg-green-100 text-green-800 py-1 px-3 rounded-full text-sm font-semibold border border-green-200">Completed</span>
                            @endif
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h4 class="text-gray-800 font-bold mb-2">📁 Bukti Hasil Pekerjaan</h4>
                            
                            @if($task->bukti_kerja)
                                <a href="{{ asset('storage/' . $task->bukti_kerja) }}" target="_blank" 
                                   class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white text-sm font-bold py-2 px-4 rounded shadow transition duration-150">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Lihat / Download Bukti
                                </a>
                                <p class="text-xs text-gray-500 mt-2">File telah diunggah oleh staf.</p>
                            @else
                                <div class="text-sm text-red-500 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Staf belum mengunggah bukti kerja.
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>