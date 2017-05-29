<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    protected $guarded = ['id', 'password', 'created_at', 'updated_at'];
    //protected $fillable = ['name', 'age', 'surname', 'patronymic', 'birthdate', 'notes'];

    protected $table = 'persons';
    /*public static function getAllUsers()
    {
        return DB::table('people')->get();
    }*/
}
