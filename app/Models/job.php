<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\application;

class job extends Model
{
    use HasFactory;
    protected $guarded = ['job_id'];
    protected $primaryKey = 'job_id';
    protected $keyType = 'string';

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function applications()
    {
        return $this->hasMany(application::class, 'job_id', 'job_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function($model){
            if(empty($model->{$model->getKeyName()})){
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }
}
