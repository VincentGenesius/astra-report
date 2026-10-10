<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskSubmission\StoreRequest;
use App\Models\Task;
use App\Models\TaskSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TaskSubmissionController extends Controller
{
    public function index()
    {
        $title = 'Astra Report - Daftar Tugas';
        $tasks = Task::with(['department', 'area'])->latest()->get();

        $taskSubmissions = TaskSubmission::where('user_id', auth()->id())
        ->get()
        ->keyBy('task_id');

        return view('task_submissions.index', [
            'title' => $title,
            'tasks' => $tasks,
            'submissions' => $taskSubmissions
        ]);
    }

    public function create(Task $task)
    {
        $title = 'Astra Report - Kumpul Tugas';

        $submission = TaskSubmission::where('task_id', $task->id)
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        return view('task_submissions.create', [
            'title' => $title, 
            'task' => $task,
            'submission' => $submission
        ]);
    }

    public function store(StoreRequest $request, Task $task)
    {
        $validatedData = $request->validated();

        if (Carbon::now()->gt(Carbon::parse($task->due_at))) {
            return back()->withErrors(['error' => 'Batas waktu pengumpulan tugas ini sudah berakhir.']);
        }

        $existing = TaskSubmission::where('task_id', $task->id)
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        if ($existing && in_array($existing->status, ['pending', 'approved', 'rejected'])) {
            return back()->withErrors(['error' => 'Tugas ini tidak dapat diubah karena sedang menunggu pemeriksaan.']);
        }

        TaskSubmission::create([
            'task_id'          => $task->id,
            'user_id'          => auth()->id(), 
            'google_drive_url' => $validatedData['google_drive_url'],
            'notes' => $validatedData['notes'] ?? null,
            'status'           => 'pending',
            'submitted_at'     => now(),
        ]);

        return redirect()->route('task-submissions.index')->with('success', 'Tugas berhasil dikumpulkan!');
    }
}
