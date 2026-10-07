<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskSubmission extends Model
{
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function dealer()
    {
        return $this->belongsTo(Dealer::class, 'user_id');
    }
}
