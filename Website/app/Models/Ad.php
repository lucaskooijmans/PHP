<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $guarded = [

    ];
    protected $table = 'ad';

    public function parent()
    {
        return $this->belongsTo(Ad::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Ad::class, 'parent_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function adType()
    {
        return $this->belongsTo(AdType::class);
    }
    public function addbids()
    {
        return $this->hasMany(AdBid::class);
    }
    public function adRatings()
    {
        return $this->hasMany(AdRating::class);
    }
}
