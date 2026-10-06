<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\StoreRequest;
use App\Http\Requests\Department\UpdateRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $title = 'Astra Report - Daftar Departemen';
        $departments = Department::select('id', 'code', 'name')->get();

        return view('departments.index', [
            'title' => $title,
            'departments' => $departments,
        ]);
    }

    public function create()
    {
        $title = 'Astra Report - Tambah Departemen';

        return view('departments.create', [
            'title' => $title,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $validatedRequests = $request->validated();

        Department::create($validatedRequests);

        return redirect()->route('departments.index');
    }

    public function show(Department $department)
    {
        $title = 'Astra Report - Detail Departemen';

        if(!$department) {
            abort(404, 'Data Departemen Tidak Ditemukan.');
        }

        return view('departments.show', [
            'title' => $title,
            'department' => $department,
        ]);
    }

    public function edit(Department $department)
    {
        $title = 'Astra Report - Edit Departemen';

        return view('departments.edit', [
            'title' => $title,
            'department' => $department
        ]);
    }

    public function update(Department $department, UpdateRequest $request)
    {
        $validatedRequests = $request->validated();

        $department->update($validatedRequests);

        return redirect()->route('departments.index');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index');
    }
}
