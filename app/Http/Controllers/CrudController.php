<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{

    public function __construct() {
        
    }
    public function index()
    {
        $offers = Offer::select(
            'id',
                     'price',
                     'name_'.LaravelLocalization::getCurrentLocale().' as name',
                    'details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
        return view("offers.index", compact('offers'));
    }

    public function create()
    {
        return view("offers.create");
    }

    public function store(OfferRequest $Request) 
    {
            // insert data in database
            Offer::create([
                'name_ar' => $Request->name_ar,
                'name_en' => $Request->name_en,
                'price' => $Request->price,
                'details_ar'=> $Request->details_ar,
                'details_en'=> $Request->details_en,
            ]);
            return redirect()->back()->with('success_create',__('messages.success_create'));
    }


}
