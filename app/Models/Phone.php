<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    // protected $table = "";   Can write here The table name different file model name
    protected $table = "phones";
    protected $fillable = ['code', 'phone', 'user_id'];  // white box

    protected $hidden = ['user_id'];
    public $timestamps = false;



    ##################### relations ####################
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
