<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Post extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeIntime($query)
    {
        return $query->where(function ($query) {
            $query->orWhere(function ($query) {
                $query->where(DB::raw('NOW()'), '>=', DB::raw('active_from'))->where(DB::raw('NOW()'), '<', DB::raw('active_to'));
            })->orWhere(function ($query) {
                $query->where(DB::raw('NOW()'), '>=', DB::raw('active_from'))->whereNull('active_to');
            });
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function sections()
    {
        return $this->belongsToMany('App\Models\Section')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}