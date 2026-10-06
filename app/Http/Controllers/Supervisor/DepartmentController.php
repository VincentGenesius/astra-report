<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
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
}
