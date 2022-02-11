<?php

namespace App\Models;

use App\Models\OrderContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'idClient',
        'paid',
        'confirmed',
        'sent',
        'delivered'
    ];

    public function content(){
        return $this->hasMany(OrderContent::class);
     }
}
