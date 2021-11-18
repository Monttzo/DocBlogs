<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    /**
     * 
     */
    protected $table = "posts";
    /**
     * 
     */
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];
    /**
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * 
     */
    public function comments()
    {
        return $this->hasMany(comment::class);
    }
}
