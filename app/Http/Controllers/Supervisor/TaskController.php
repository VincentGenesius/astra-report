<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Models\Area;
use App\Models\Department;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $title = 'Astra Report - Daftar Tugas';
        $tasks = Task::with(['department', 'area', 'creator'])->latest()->get();

        return view('tasks.index', [
            'title' => $title,
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        $title = 'Astra Report - Tambah Tugas';
        $departments = Department::all();
        $areas = Area::all();

        return view('tasks.create', [
            'title' => $title,
            'departments' => $departments,
            'areas' => $areas
        ]);
    }

    public function store(StoreRequest $request)
    {
        $validatedRequests = $request->validated();

        $validatedRequests['created_by'] = auth()->id();

        Task::create($validatedRequests);

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        $title = 'Astra Report - Detail Tugas';

        if(!$task) {
            abort(404, 'Data Tugas Tidak Ditemukan.');
        }

        return view('tasks.show', [
            'title' => $title,
            'task' => $task,
        ]);
    }

    public function edit(Task $task)
    {
        $title = 'Astra Report - Edit Tugas';
        $departments = Department::all();
        $areas = Area::all();

        return view('tasks.edit', [
            'title' => $title,
            'task' => $task,
            'departments' => $departments,
            'areas' => $areas
        ]);
    }

    public function update(Task $task, UpdateRequest $request)
    {
        $validatedRequests = $request->validated();

        $task->update($validatedRequests);

        return redirect()->route('tasks.index');
    }

    // public function destroy(Department $department)
    // {
    //     $department->delete();

    //     return redirect()->route('departments.index');
    // }
}
