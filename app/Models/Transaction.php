<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pickup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Transaction extends Model
{
    // use HasFactory;
    protected $guarded = ['transaction_id'];
    protected $primaryKey = 'transaction_id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(function($model){
            if(empty($model->{$model->getKeyName()})){
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pickup(){
        return $this->hasOne(Pickup::class, 'transaction_id', 'transaction_id');
    }
}
