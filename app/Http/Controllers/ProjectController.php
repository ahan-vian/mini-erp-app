<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }
    public function store(Request $request)
    {
        $manager_id = Auth::id();
        $request->validate([
            'nama_project'=>'required',
            'deskripsi_project'=>'required',
            'tanggal_mulai'=>'required|date',
            'tanggal_selesai'=>'required|date'
        ]);
        Project::create([
            'nama_project'=> $request->nama_project,
            'deskripsi_project'=> $request->deskripsi_project,
            'tanggal_mulai'=> $request->tanggal_mulai,
            'tanggal_selesai'=> $request->tanggal_selesai,
            'manager_id'=>$manager_id
        ]);

        return redirect()->route('project.index')->with('success','Proyek berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
