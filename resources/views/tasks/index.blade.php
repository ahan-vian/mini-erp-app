<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Tugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('tasks.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded shadow mb-4 inline-block hover:bg-blue-600">
                    + Tambah Tugas
                </a>

                <table class="w-full text-left border-collapse mt-4">
                    <thead>
                        <tr class="border-b-2">
                            <th class="py-2">No</th>
                            <th class="py-2">Nama Tugas</th>
                            <th class="py-2">Proyek Terkait</th>
                            <th class="py-2">Ditugaskan ke</th>
                            <th class="py-2">Tenggat Waktu</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2">{{ $loop->iteration}}</td>
                                <td class="py-2">{{ $task->nama_task}}</td>
                                <td class="py-2">{{ $task->project->nama_project}}</td>
                                <td class="py-2">{{ $task->user->name}}</td>
                                <td class="py-2">{{ $task->tanggal_selesai}}</td>
                                <td class="py-2">
                                    @if ($task->status == 'on_progres')
                                        <span class="bg-yellow-200 text-yellow-800 py-1 px-2 rounded text-xs">On Progress</span>
                                    @else
                                        <span class="bg-green-200 text-yellow-800 py-1 px-2 rounded text-xs">Completed</span>
                                    @endif
                                </td>
                                <td class="py-2 flex space-x-2 gap-2">
                                    <a href="{{ route('tasks.show', $task->id) }}"
                                        class="bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600 shadow-sm">
                                        Detail
                                    </a>
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 shadow-sm">
                                        Edit
                                    </a>
                                    @if (Auth::user()->role == 'manager')
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus tugas ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 shadow-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>