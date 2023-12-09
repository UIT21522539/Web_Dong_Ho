<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use DB;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $primaryKey = 'id_user';
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
        'password' => 'hashed',
    ];

    public function getAllUser(){
        $user = DB::select("SELECT * FROM user");
        return $user;
    }

    public function getUser($id){
        return DB::select("SELECT * FROM user WHERE id_user = ?",[$id]);
    }

    public function searchUser($searchKeyword){
        $results = DB::table('user')
        ->where('first_name', 'LIKE', '%' . $searchKeyword . '%')
        ->orWhere('last_name', 'LIKE', '%' . $searchKeyword . '%')
        ->get();
        
    return $results;
    }
    public $timestamps = false;
    protected $table = 'user';

    public function cartProducts()
    {
        return $this->belongsToMany(Product::class, 'ct_cart', 'id_user', 'id_product');
    }
}
