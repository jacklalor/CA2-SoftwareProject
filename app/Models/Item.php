<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'condition',
        'price',
        'description',
        'sub_description',
        'category_id',
        'user_id',
        'item_image',
    ];

    protected $table = 'item_listing';

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
