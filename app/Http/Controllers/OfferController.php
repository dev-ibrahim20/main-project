<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use \App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use App\Models\Offer;
class OfferController extends Controller
{
    use ImageSaveTrait;

    public function index()
    {

        $offers = Offer::get();
        return view("ajaxoffer.index", compact("offers"));

    }

    public function create()
    {
         // View from to add this offer
         return view('ajaxoffer.create');
    }

    public function store(OfferRequest $Request)
    {
        // Save this offer into DB using AJax

       $image_name = $this->saveImage($Request->image, '/images/offers/');

        // insert data in database
        $offer = Offer::create([
            'name_ar' => $Request->name_ar,
            'name_en' => $Request->name_en,
            'price' => $Request->price,
            'details_ar'=> $Request->details_ar,
            'details_en'=> $Request->details_en,
            'photo' => $image_name,
        ]);
        if($offer)
            return response()->json([
                'status' => true,
                'msg'=> 'تم الحفظ بنجاح'
            ]);
        else
             return response()->json([
                 'status' => false,
                 'msg'=> 'فشل الحفظ'
             ]);
    }

    public function edit(Request $request)
    {
        $offer = Offer::findOrFail($request->id);
        #################
        if(!$offer)
            return response()->json([
            'status'=> false,
            'msg'=> 'هذا العرض غير موجود'
        ]);
        #################
        $offer = Offer::select(
            'id',
            'name_ar',
            'name_en',
            'price',
            'details_ar',
            'details_en',
        )->find($request->id);
        return view('ajaxoffer.edit', compact('offer'));
    }


    public function update(OfferRequest $request)
    {
        
       $offer = Offer::findOrFail($request->offer_id);
        #################
        if(!$offer)
            return response()->json([
            'status'=> false,
            'msg'=> 'هذا العرض غير موجود'
        ]);
        #################
        $offer->update($request->all());
        #################
        if($offer)
            return response()->json([
                'status' => true,
                'msg'=> 'تم التعديل بنجاح'
            ]);
        else
             return response()->json([
                 'status' => false,
                 'msg'=> 'فشل التعديل'
             ]);
    }

    public function delete(Request $request)
    {
        $offerr = Offer::findOrFail($request->id);
             if(!$offerr)
                return response()->json([
                    'status' => false,
                    'msg'=> 'العنصر غير موجود للحذف'
                ]);
            $offerr->delete();
            return response()->json([
                'status' => true,
                'msg'=> 'تم الحذف بنجاح',
                'data' => $request-> id,
            ]);
     


    }
   
}