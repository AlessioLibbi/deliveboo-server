<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'description', 'visibility', 'price'];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
