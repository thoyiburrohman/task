<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'tasks' => Task::all(),
        ];
        return view('pages.task.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'projects' => Project::all()
        ];
        return view('pages.task.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = $request->validate([
            'project_id' => 'required',
            'name' => 'required',
            'deadline' => 'required',
            'priority' => 'required',
            'tim' => 'required',
        ]);
        $store['status'] = 'belum dimulai';
        Task::create($store);
        Session::flash('success', 'Tugas berhasil disimpan');
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $data = [
            'projects' => Project::all(),
            'task' => $task::find($task->id),
        ];
        return view('pages.task.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {

        $update = $request->validate([
            'project_id' => 'required',
            'name' => 'required',
            'deadline' => 'required',
            'priority' => 'required',
            'tim' => 'required',
        ]);

        Task::where('id', $task->id)->update($update);
        Session::flash('success', 'Tugas berhasil diupdate');
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Task::destroy($task->id);
        Session::flash('success', 'Tugas berhasil dihapus');
        return redirect()->route('task.index');
    }

    public function changeStatus(Task $task, Request $request)
    {
        Task::where('id', $task->id)->update(['status' => $request->status]);
        $task =  Task::all();
        if ($task->where('status', 'sedang berlangsung')->count() > 0) {
            Project::where('id', $request->project_id)->update(['status' => 'sedang berlangsung']);
        } elseif ($task->where('status', 'sedang berlangsung')->count() <= 0) {
            Project::where('id', $request->project_id)->update(['status' => 'selesai']);
        }
        Session::flash('success', 'Status berhasil diupdate');
        return redirect()->route('task.index');
    }
}
