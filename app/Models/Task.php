<?php

namespace App\Models;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;
class Task extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
