<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'business';

    public function featuredAd()
    {
        return $this->hasOne(Ad::class);
    }
  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
