<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use Illuminate\Support\Str;

class Pickup extends Model
{
    // use HasFactory;
    protected $guarded = ['pickup_id'];
    protected $primaryKey = 'pickup_id';
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
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
