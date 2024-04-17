<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tent extends Model
{
    // Define the relationship with the Seller model
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }
}
