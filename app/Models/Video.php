<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    // protected $table = "";   Can write here The table name different file model name
    protected $table = "videos";
    protected $fillable = ['name', 'viewers'];  // white box
    protected $hidden = [];
    public $timestamps = false;
}
