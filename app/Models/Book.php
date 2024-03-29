<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'category_id', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(BookCategory::class);
    }
    public function stocks()
    {
        return $this->hasMany(BookStock::class);
    }

    public function scopeFilter($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }
    // Search by title
    public function getRouteKeyName(){
        return 'title';
    }
}
