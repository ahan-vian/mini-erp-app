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
                <form action="{{ route('tasks.update', $task->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @if (Auth::user()->role == 'manager')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Tugas (Task)</label>
                            <input type="text" name="nama_task" id="nama_task" value="{{ $task->nama_task }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-ouline"
                                placeholder="Contoh: Buat fitur Login">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Tugas (Task)</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-ouline"
                                placeholder="Jelaskan Detail Tugas ini">{{ $task->deskripsi }}</textarea>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="mb-4">
                                <label class="">Pilih Proyek</label>
                                <select name="project_id" id="project_id"
                                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                                    <option value="">--Pilih Proyek Terkait--</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->nama_project }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="">Tugaskan Kepada</label>
                                <select name="karyawan_id" id="karyawan_id"
                                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                                    <option value="">--Pilih Staff--</option>
                                    @foreach ($semua_staff as $staff)
                                        <option value="{{ $staff->id }}" {{ $task->karyawan_id == $staff->id ? 'selected' : '' }}>{{ $staff->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="">Level Tugas</label>
                                <select name="level" id="level"
                                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                                    <option value="">--Pilih Level--</option>
                                    <option value="low" {{ $task->level == 'low' ? 'selected' : '' }}>Low</option>
                                    <option value="medium" {{ $task->level == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="high" {{ $task->level == 'high' ? 'selected' : '' }}>High</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                    value="{{ $task->tanggal_mulai }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-ouline">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                    value="{{ $task->tanggal_selesai }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-ouline">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                                <select name="status" id="status"
                                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                                    <option value="on_progres" {{ $task->status == 'on_progres' ? 'selected' : '' }}>On
                                        Progress</option>
                                    <option value="complete" {{ $task->status == 'complete' ? 'selected' : '' }}>Completed
                                    </option>
                                </select>
                            </div>
                        </div>
                    @else
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg border">
                            <h3 class="font-bold text-lg text-gray-800">Nama Tugas: {{ $task->nama_task }}</h3>
                            <p class="text-gray-700 mt-2"><strong>Deskripsi:</strong> {{ $task->deskripsi }}</p>
                            <p class="text-sm text-red-500 mt-2 font-bold">Tenggat Waktu: {{ $task->tanggal_selesai }}</p>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select name="status" id="status"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                                <option value="on_progres" {{ $task->status == 'on_progres' ? 'selected' : '' }}>On Progress
                                </option>
                                <option value="complete" {{ $task->status == 'complete' ? 'selected' : '' }}>Completed
                                </option>
                            </select>
                        </div>
                    @endif

                    <div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:shadow-outline w-full shadow-lg">
                            Update Tugas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>