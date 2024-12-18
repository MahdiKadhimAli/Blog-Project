<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['namw'];
    public function blogs()
    {
        //One Category can have multiple blogs
        return $this->hasMany(Blog::class);
    }
}