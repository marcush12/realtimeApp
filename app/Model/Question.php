<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($question) {
            $question->slug = str_slug($question->title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];//error mass assignment; use like below simplest way!
    //protected $guarded = [];//replace above line; ignore mass assignment for all fields
    protected $fillable = ['title', 'slug', 'body', 'user_id', 'category_id'];
    protected $with = ['replies'];//load relatioship

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        return "/question/$this->slug";//tirou asset pq quer somente uma parte da path
    }
}
