<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'start_at', 'end_at', 'user_id', 'task_type', 'status', 'created_at', 'updated_at'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class,'task_type');
    }
}
