<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{

    public function __construct() {
        
    }
    public function getOffers()
    {
        return Offer::get();
    }

    public function create()
    {
        return view("offers.create");
    }

    public function store(Request $Request) 
    {
        $message = $this->getMessage();
        $rules = $this->getRules();
        // validate data in request
        $validator = Validator::make($Request->all(),$rules, $message);
        if ($validator->fails()) {
            return redirect()->route('offers.create')->withErrors($validator)->withInput(request()->all());
        }
        else{
            // insert data in database
            Offer::create([
                'name' => $Request->name,
                'price' => $Request->price,
                'details'=> $Request->details,
            ]);
            return redirect()->back()->with('success','Offer Created Successfully');
        }
    }
    protected function getMessage()
    {
        return $message = [
        'name.required' => 'Offer name is required',
        'name.string' => 'Offer name must be string',
        'name.max' => 'Offer name must be less than 100 characters',
        'name.unique' => 'Offer name must be unique',
        'price.required' => 'Offer price is required',
        'price.numeric'=> 'Offer price must be numeric',
        'price.min' => 'Offer price must be greater than 0',
        'details.required' => 'Offer details is required',
        'details.string'=> 'Offer details must be string',
        'details.max' => 'Offer details must be less than 1000 characters',
        ];
    }

    protected function getRules()
    {
        return $rules = [
            'name' => 'required|string|max:100|unique:offers,name',
            'price' => 'required|numeric|min:0',
            'details' => 'required|string|max:1000',
        ];
    }
}
