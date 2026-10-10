<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\TaskSubmission;
use Illuminate\Http\Request;

class TaskReviewController extends Controller
{
    public function index()
    {
        $title = 'Astra Report - Daftar Pengumpulan Tugas';
        
        $submissions = TaskSubmission::with(['task', 'dealer', 'task.department', 'task.area'])
            ->latest()
            ->get();

        return view('task_reviews.index', [
            'title' => $title, 
            'submissions' => $submissions
        ]);
    }

    public function create()
    {
        $title = 'Astra Report - Pemeriksaan Tugas';

        return view('task_reviews.create', [
            'title' => $title,
        ]);
    }
}
