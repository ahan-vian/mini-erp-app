<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->search;
        if ($user->role == 'manager') {
            $tasks = Task::where('nama_task', 'like', '%' . $search . '%')->paginate(5);
        } else {
            $tasks = Task::where('karyawan_id', $user->id)->where('nama_task', 'like', '%' . $search . '%')->paginate(5);
        }
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $semua_staff = User::where('role', 'staff')->get();
        return view('tasks.create', compact('projects', 'semua_staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_task' => 'required',
            'deskripsi' => 'required',
            'level' => 'required',
            'karyawan_id' => 'required',
            'project_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        Task::create([
            'nama_task' => $request->nama_task,
            'deskripsi' => $request->deskripsi,
            'level' => $request->level,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'karyawan_id' => $request->karyawan_id,
            'project_id' => $request->project_id,
        ]);
        return redirect()->route('tasks.index')->with('success', 'Tugas Karyawan telah dimasukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = Project::all();
        $semua_staff = User::where('role', 'staff')->get();
        return view('tasks.edit', compact('task', 'semua_staff', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $user = Auth::user();

        if ($user->role == 'manager') {
            $request->validate([
                'nama_task' => 'required',
                'deskripsi' => 'required',
                'level' => 'required',
                'status' => 'required',
                'karyawan_id' => 'required',
                'project_id' => 'required',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
            ]);
            $task->update([
                'nama_task' => $request->nama_task,
                'deskripsi' => $request->deskripsi,
                'level' => $request->level,
                'status' => $request->status,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'karyawan_id' => $request->karyawan_id,
                'project_id' => $request->project_id,
            ]);
        } else {
            $request->validate([
                'status' => 'required',
                'bukti_kerja' => 'nullable|file|mimes:pdf,jpg,jpeg,png,zip|max:10240',
            ]);

            $updateData = [
                'status' => $request->status
            ];
            if ($request->hasFile('bukti_kerja')) {
                if ($task->bukti_kerja) {
                    Storage::delete($task->bukti_kerja);
                }
                $pathFileBaru = $request->file('bukti_kerja')->store('bukti-kerja', 'public');
                $updateData['bukti_kerja'] = $pathFileBaru;
            }
            $task->update($updateData);
        }
        return redirect()->route('tasks.index')->with('success', 'Tugas Berhasil di Update/Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $tasks)
    {
        $tasks->delete();
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil di Hapus');
    }
}
