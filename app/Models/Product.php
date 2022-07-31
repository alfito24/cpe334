<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;

class Product extends Model
{
    // use HasFactory;
    protected $guarded = ['product_id'];
    protected $primaryKey = 'product_id';
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
        return $this->belongsTo(User::class);
    }
}
