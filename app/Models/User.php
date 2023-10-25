<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role_id',
        'address',
        'phone_number',
        'gender',
        'birth_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $guarded = ['user_id'];
    protected $primaryKey = 'user_id';
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

    public function role(){
        return $this->hasMany(Role::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class, 'user_id', 'user_id');
    }
}
