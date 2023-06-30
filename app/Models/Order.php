<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function statuses()
    {
        return $this->belongsTo(Status::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
