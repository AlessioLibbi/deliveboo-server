<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'adress', 'email', 'number', 'PIVA', 'slug'];
    public function cookings()
    {
        return $this->belongsToMany(Cooking::class);
    }
}
