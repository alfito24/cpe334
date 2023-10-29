<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class job extends Model
{
    use HasFactory;
    protected $guarded = ['job_id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
