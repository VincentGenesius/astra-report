<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('task_submissions')]
#[Fillable(['task_id', 'user_id', 'google_drive_url', 'notes', 'status', 'submitted_at'])]
class TaskSubmission extends Model
{
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function dealer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'pending' => 'Menunggu',
            'revision' => 'Revisi',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            default => 'Belum Kumpul',
        };
    }
}
