<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'price',
        'description',
        'slug'
    ];

    //hasMany punya 3 parameter 1 buat modelnya, 2 buat local key, 3 buat foreign key
    public function product_gallery()
    {
        return $this->hasMany(ProductGalery::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id', 'category_id');
    }
}
