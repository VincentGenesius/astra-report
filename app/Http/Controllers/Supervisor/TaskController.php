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
        $tasks = Task::with(['department', 'area', 'creator', 'submissions'])->latest()->get();

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
}
