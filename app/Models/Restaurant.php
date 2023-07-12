<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'email', 'number', 'PIVA', 'slug', 'user_id',];
    public function cookings()
    {
        return $this->belongsToMany(Cooking::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function getUniqueSlugFromTitle($title)
    {
        $slug = Str::slug($title);
        $slug_base = $slug;
        $post_found = Restaurant::where('slug', '=', $slug)->first();
        $counter = 1;
        while ($post_found !== null) {
            $slug =  $slug_base . '-' . $counter;
            $post_found = Restaurant::where('slug', '=', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
