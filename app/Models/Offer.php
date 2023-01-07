<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
 
    use HasFactory;
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'price',
        'details_ar',
        'details_en',
    ];
    protected $hidden = [
     'created_at',
     'updated_at',
    ];

}
