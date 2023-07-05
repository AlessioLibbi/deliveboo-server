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
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function getUniqueSlugFromTitle($title)
    {
        // Controlliamo se esiste già un post con questo slug
        // Se esiste, aggiungo -1
        // Controllo e se esiste, aggiungo -2 
        // Finchè non trovo uno libero
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
