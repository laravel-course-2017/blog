<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    protected $hidden = ['password', 'remember_token'];

    public function getUserNameAttribute()
    {
        $name = explode('@', $this->email)[0];
        $name = str_replace(['_','.'], ' ', $name);
        $nameParts = explode(' ', $name);
        array_walk($nameParts, function(&$el) {
            $el = ucfirst($el);
        });

        return implode(' ', $nameParts);
    }

    public function setUserNameAttribute($value)
    {
        $nameParts = explode(' ', $value);
        $this->attributes['email'] = strtolower(implode('.', $nameParts)) . '@epam.com';
    }

    public function phone()
    {
        return $this->hasOne('App\Models\Phone');
    }
}
