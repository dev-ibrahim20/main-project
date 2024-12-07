<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\ImageSaveTrait;
class CrudController extends Controller
{
    use ImageSaveTrait;

    public function __construct() {
        
    }
    public function index()
    {
        $offers = Offer::select(
            'id',
                     'price',
                     'photo',
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

        // Save image in  folder
        $image_name = $this->saveImage($Request->image, '/images/offers/');

        // insert data in database
        Offer::create([
            'name_ar' => $Request->name_ar,
            'name_en' => $Request->name_en,
            'price' => $Request->price,
            'details_ar'=> $Request->details_ar,
            'details_en'=> $Request->details_en,
            'photo' => $image_name,
        ]);
        return redirect()->back()->with('success_create',__('messages.success_create'));
    }

    public function edit($id)
    {
        $offer = Offer::find($id);
        if(!$offer)
            return redirect()->back();

        return view("offers.edit", compact('offer'));
    }
    public function update(OfferRequest $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update( $request->all() );

        return redirect()->back()->with('success_update',__('messages.success_update'));
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return redirect()->back();
    }





    public function getViews()
    {
        $video = Video::first();

        event(new VideoViewer(  $video));
        return view('views', compact('video'));
    }

}
