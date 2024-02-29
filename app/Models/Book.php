<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'category_id'];

    public function category()
    {
        return $this->belongsTo(BookCategory::class);
    }
    public function stocks()
    {
        return $this->hasMany(BookStock::class);
    }
}
