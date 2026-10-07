<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $validatedRequests = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'exists:departments,id'],
            'area_id' => ['required', 'exists:areas,id'],
            'due_at' => ['required', 'date'],
        ]);

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

    // public function edit(Department $department)
    // {
    //     $title = 'Astra Report - Edit Departemen';

    //     return view('departments.edit', [
    //         'title' => $title,
    //         'department' => $department
    //     ]);
    // }

    // public function update(Department $department, UpdateRequest $request)
    // {
    //     $validatedRequests = $request->validated();

    //     $department->update($validatedRequests);

    //     return redirect()->route('departments.index');
    // }

    // public function destroy(Department $department)
    // {
    //     $department->delete();

    //     return redirect()->route('departments.index');
    // }
}
