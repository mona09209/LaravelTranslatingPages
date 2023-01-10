<?php

namespace App\Http\Controllers;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class CrudController extends Controller
{
        
function fillable(){
     return   Offer::get();
}

public function __construct()
{
        
}

function create(){
        return view(view:'offers.create');
}
function store(OfferRequest $request){

                //save photo to public folder
                $file_extension = $request->photo->getClientOriginalExtension();
                $file_name = time() .'.'. $file_extension;
                $path = 'images/offers';
                $request->photo->move($path,$file_name);
                
        
        Offer::create([
                'name_ar' =>$request->name_ar,
                'name_en' =>$request->name_en,
                'photo' =>$file_name,
                'price' =>$request->price,
                'details_ar'=>$request->details_ar,
                'details_en'=>$request->details_en,
             ]);
                return redirect()->back()->with(['success' => __('messages.Offer inserted successfully!')]);
                

}

public function getAllOffers(){
            $offers=  Offer::select('id','name_'.LaravelLocalization::getCurrentLocale(),'photo','price','details_'.LaravelLocalization::getCurrentLocale())->get();
                return view('offers.all',compact('offers'));     
}
public function editOffer($offer_id){
                $offer = Offer::find($offer_id);
                if (!$offer_id)
                        return redirect()->back();
                $offer = Offer::select('id', 'name_ar', 'name_en','photo', 'price', 'details_ar', 'details_en')->find($offer_id);

                return view('offers.edit',compact(var_name:'offer'));
}
public function updateOffer(OfferRequest $request,$offer_id){
        $offer = Offer::find($offer_id);
        if (!$offer)
        return redirect()->back();
                $offer ->update($request->all());
                return redirect()->back()->with(['success'=>__('messages.Offer updated successfully!')]);
}
}
