<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected array $fillable = [
        'id',
        'name',
        'lastname',
        'email',
        'telephone'
    ];

    public static array $rules = [
        "name" => "required|max:120",
        "lastname" => "required|max:120",
        "email" => "required|email|max:60",
        "telephone" => "required|max:32"
    ];
}
