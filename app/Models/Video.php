<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
   // protected $table = "videos";
    protected $fillable = [
        'name',
        'viewers',
    ];
    public $timestamp = false;
    protected $hidden = [
        'created_at',
        'updated_at',
       ];
   
  // public $timestamp =false;

}
