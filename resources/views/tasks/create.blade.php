<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Tugas Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Tugas (Task)</label>
                        <input type="text" name="nama_task" id="nama_task" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-ouline" placeholder="Contoh: Buat fitur Login">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Tugas (Task)</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-ouline" placeholder="Jelaskan Detail Tugas ini"></textarea>
                    </div>
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div class="mb-4">
                            <label class="">Pilih Proyek</label>
                            <select name="project_id" id="project_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                                <option value="">--Pilih Proyek_terkait--</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->nama_project }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="">Tugaskan Kepada</label>
                            <select name="karyawan_id" id="karyawan_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                                <option value="">--Pilih Staff--</option>
                                @foreach ($semua_staff as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="">Level Tugas</label>
                            <select name="level" id="level" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                                <option value="">--Pilih level--</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-ouline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-ouline">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:shadow-outline w-full shadow-lg">
                            Simpan Tugas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>