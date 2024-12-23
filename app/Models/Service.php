<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    protected $table = 'services';

    protected $fillable = [
        'name',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot',
    ];

    public $timestamps = true;



    public function doctors()
    {
        return $this->belongsToMany(Doctor::class,'doctor_service','service_id','doctor_id', 'id', 'id');
    }

}
