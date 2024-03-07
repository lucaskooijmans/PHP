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
        return $this->belongsTo(AdType::class, 'type_id');
    }
    public function addbids()
    {
        return $this->hasMany(AdBid::class);
    }
    public function adRatings()
    {
        return $this->hasMany(AdRating::class);
    }
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
