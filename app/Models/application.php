<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\job;

class application extends Model
{
    use HasFactory;
    protected $guarded = ['application_id'];
    protected $primaryKey = 'application_id';
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function($model){
            if(empty($model->{$model->getKeyName()})){
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function job()
    {
        return $this->belongsTo(job::class, 'job_id', 'job_id');
    }
}
