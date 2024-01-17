<?php

// app/Models/Admin.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    protected $fillable = [
        'huy', '123',
    ];

    public function authenticate($username, $password)
    {
        $admin = $this->where('username', $username)->first();

        if ($admin && Hash::check($password, $admin->password)) {
            return $admin;
        }

        return null;
    }
}

