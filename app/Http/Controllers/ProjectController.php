<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'projects' => Project::all(),

        ];
        return view('pages.project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'location' => 'required',
            'date' => 'required',
            'deadline' => 'required',
        ]);

        $store['status'] = 'belum dikerjakan';
        if ($request->file) {
            $store['file'] = $request->file('file')->store('file_pendukung');
        }
        Project::create($store);
        Session::flash('success', 'Project berhasil disimpan');
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data = [
            'project' => Project::find($project->id)
        ];
        return view('pages.project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $update = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'location' => 'required',
            'date' => 'required',
            'deadline' => 'required',
        ]);

        Project::where('id', $project->id)->update($update);
        Session::flash('success', 'Project berhasil diupdate');
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Project::destroy($project->id);
        Session::flash('success', 'Project berhasil dihapus');
        return redirect()->route('project.index');
    }
    public function cancel(Project $project)
    {
        Project::where('id', $project->id)->update(['status' => 'batal']);
        Session::flash('success', 'Project berhasil dibatalkan');
        return redirect()->route('project.index');
    }
}
