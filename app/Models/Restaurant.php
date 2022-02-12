<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'postal_code',
        'city',
        'address1',
        'address2'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'restaurant_id');
    }
}
