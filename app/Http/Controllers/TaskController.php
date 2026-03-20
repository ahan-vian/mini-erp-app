<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'manager'){
            $tasks = Task::all();
        }
        else{
            $tasks = Task::where('karyawan_id', $user->id)->get();
        }
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $semua_staff = User::where('role','staff')->get();
        return view('tasks.create', compact('projects', 'semua_staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_task'=>'required',
            'deskripsi'=>'required',
            'level'=>'required',
            'karyawan_id'=>'required',
            'project_id'=>'required',
            'tanggal_mulai'=>'required|date',
            'tanggal_selesai'=>'required|date',
        ]);

        Task::create([
            'nama_task'=>$request->nama_task,
            'deskripsi'=>$request->deskripsi,
            'level'=>$request->level,
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_selesai'=>$request->tanggal_selesai,
            'karyawan_id'=>$request->karyawan_id,
            'project_id'=>$request->project_id,
        ]);
        return redirect()->route('tasks.index')->with('success','Tugas Karyawan telah dimasukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $tasks)
    {
        return view('Task.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $tasks)
    {
        $request->validate([
            'nama_task'=>'required',
            'deskripsi'=>'required',
            'level'=>'required',
            'karyawan_id'=>'required',
            'project_id'=>'required',
            'tanggal_mulai'=>'required|date',
            'tanggal_selesai'=>'required|date',
        ]);

        $tasks->update([
            'nama_task'=>$request->nama_task,
            'deskripsi'=>$request->deskripsi,
            'level'=>$request->level,
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_selesai'=>$request->tanggal_selesai,
            'karyawan_id'=>$request->karyawan_id,
            'project_id'=>$request->project_id,
        ]);
        return redirect()->route('tasks.index')->with('success','Tugas Berhasil di Update/Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $tasks)
    {
        $tasks->delete();
        return redirect()->route('tasks.index')->with('success','Tugas berhasil di Hapus');
    }
}
