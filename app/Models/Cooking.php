<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooking extends Model
{
    protected $fillable = ['name'];
    use HasFactory;
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
