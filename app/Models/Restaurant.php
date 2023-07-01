<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'email', 'number', 'PIVA', 'slug', 'user_id'];
    public function cookings()
    {
        return $this->belongsToMany(Cooking::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
