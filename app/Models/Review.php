<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
    public function writer()
    {
        return $this->belongsTo(User::class, 'writer_user_id');
    }
    public function reciever()
    {
        return $this->belongsTo(User::class, 'reciever_user_id');
    }
}
