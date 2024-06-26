<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdType extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'ad_type';

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
