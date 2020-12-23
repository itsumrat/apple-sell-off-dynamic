<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = "customers";
    protected $fillable = ['name', 'email', 'phone', 'address', 'password'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function validation()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:customers',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
