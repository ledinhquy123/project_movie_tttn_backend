<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';

    protected $fillable = [
        'user_id',
        'movie_id',
        'screen_name',
        'seats_name',
        'showdate',
        'show_time',
        'total_price',
        'transaction_type_id'
    ];

    public function movie() {
        return $this->belongsTo(
            Movie::class, 'movie_id', 'id_movie'
        );
    }

    public function user() {
        return $this->belongsTo(
            User::class, 'user_id', 'id'
        );
    }

    public function transactionType() {
        return $this->belongsTo(
            TransactionType::class, 'transaction_type_id', 'id'
        );
    }
}
