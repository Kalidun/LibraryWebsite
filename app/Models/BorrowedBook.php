<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'stock_id', 'borrow_date', 'return_date', 'is_returned', 'status_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function stock(){
        return $this->belongsTo(BookStock::class);
    }
    public function status(){
        return $this->belongsTo(BookStatus::class);
    }
}
