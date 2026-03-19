<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('project.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded shadow mb-4 inline-block hover:bg-blue-600">
                    + Tambah Project
                </a>

                <table class="w-full text-left border-collapse mt-4">
                    <thead>
                        <tr class="border-b-2">
                            <th class="py-2">No</th>
                            <th class="py-2">Nama Proyek</th>
                            <th class="py-2">Tenggat Waktu</th>
                            <th class="py-2">Manager (ID)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2">{{ $loop->iteration}}</td>
                                <td class="py-2">{{ $project->nama_project}}</td>
                                <td class="py-2">{{ $project->tanggal_selesai}}</td>
                                <td class="py-2">{{ $project->user->name}} (ID:{{ $project->manager_id }})</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>