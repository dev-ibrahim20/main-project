<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    // protected $table = "";   Can write here The table name different file model name
    protected $table = "offers";
    protected $fillable = ['name', 'price', 'details'];  // white box
    protected $hidden = ['created_at', 'updated_at'];
    // public $timestamps = false;
}