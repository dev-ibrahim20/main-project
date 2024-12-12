<?php

namespace App\Http\Controllers\Relation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Phone;

class RelationsController extends Controller
{
    //
    public function hasOneRelation()
    {
        $user = User::With(['phone' => function ($q){
            $q->select('code', 'phone', 'user_id');
        }])->find(id: 2);
        // return $user->phone->code;
        return response()->json($user);
    }


    public function hasOndeRelationRverse()
    {
        $phone =Phone::find(1);
        // make some attributes visibale
        $phone->makeVisible(['user_id']);
        $phone->makeHidden(['code']);
        
        // return $phone->user;
        // get All data phone && user
        return $phone = Phone::with('user')->find(id: $phone->id);
    }

    public function getUserHasPhone()
    {
        $user = User::with('phone')->whereHas('phone', function($q){
            $q->where('code', '02');
        })->get();
        
        return $user;
    }
}
