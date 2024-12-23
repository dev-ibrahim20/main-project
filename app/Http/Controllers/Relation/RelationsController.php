<?php

namespace App\Http\Controllers\Relation;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Phone;

class RelationsController extends Controller
{
    // One To One
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
        return $phone = Phone::with('user')->find(1);
    }

    public function getUserHasPhone()
    {
        $user = User::with('phone')->whereHas('phone', function($q){
            $q->where('code', '02');
        })->get();
        
        return $user;
    }



    // One To Many relationship methods

    public function getHospitalDoctors()
    {
        $hospital = Hospital::find(1);
        // $hospital = Hospital::with('doctors')->find(1);
        // return $hospital->doctors;   return Hospital Doctors
        // return $hospital->name;
        // foreach($hospital->doctors as $doctor){
        //     echo $doctor->name . '<br>';
        // }

        $doctorss = Doctor::find(3);
        return $doctorss->hospital->name;
    }



    public function hospital()
    {
        $hospital = Hospital::select('id', 'name', 'address')->get();
        return view('hospital.hospitals', compact('hospital'));
    }

    public function doctor($hospital_id)
    {
        $hospital = Hospital::find($hospital_id);
        $doctor = $hospital->doctors;  
        return view('hospital.doctors', compact('doctor'));
    }


    public function hospitalHasDoctor()
    {
        $hospitals = Hospital::whereHas('doctors')->get();
        return $hospitals;
    }

    public function hospitalHasnotDoctor()
    {
        $hospitals = Hospital::whereDoesntHave('doctors')->get();
        return $hospitals;
    }


    public function getDoctorsServices()
    {
        $doctor = Doctor::with('services')->find(3);
        return $doctor->services[0]->name;
        //  $doctor->services;
    }

    public function getServicesDoctors()
    {
        $servicse = Service::with('doctors')->find(1);
        return $servicse;
    }


    public function DoctorServices($doctor_id)
    {
        $doctor = Doctor::with('services')->find($doctor_id);
        $service = $doctor->services;
        return view('hospital.doctorServices', compact('service'));
    }

}
 