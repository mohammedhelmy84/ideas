<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'likes',
    ];

    public function comments(){
        return $this->hasMany(Comment::class,'idea_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
