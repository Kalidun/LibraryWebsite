<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStock extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'status_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function status(){
        return $this->belongsTo(BookStatus::class);
    }
    public function borrowedBooks(){
        return $this->hasMany(BorrowedBook::class);
    }
}
