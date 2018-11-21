<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];//error mass assignment; use like below simplest way!
    protected $guarded = [];//replace above line; ignore mass assignment for all fields

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }
}
