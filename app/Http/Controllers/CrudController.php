<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Lang\ar\messages;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class CrudController extends Controller
{
        
function fillable(){
     return   Offer::get();
}

public function __construct()
{
        
}
/* function store(){
     Offer::create([
        'name' =>'eddy',
        'price' =>'3000',
        'details'=>'offers details'
     ]);
} */
function create(){
        return view(view:'offers.create');
}
function store(Request $request){

        $rules=  $this->GetRules();
        $messages = $this->GetMassages();
        $validator =Validator::make($request->all(), $rules,$messages
);

if($validator->fails()){

        return redirect()->back()->withErrors($validator)->withInputs($request->all());
}
        Offer::create([
                'name_ar' =>$request->name_ar,
                'name_en' =>$request->name_en,
                'price' =>$request->price,
                'details_ar'=>$request->details_ar,
                'details_en'=>$request->details_en
             ]);
             return redirect()->back()->with(['success'=>__('messages.Offer inserted successfully!')]);

}
function GetRules(){
        return  $rules = [
                'name_ar' => 'required|unique:offers',
                'name_en' => 'required|unique:offers',
                'price' => 'required|numeric',
                'details_ar' => 'required',
                'details_en' => 'required',
        ];
}
 function GetMassages(){
        return  $messages = [
                'name_ar.required' => 'messages.offer name in ar is required',
                'name_en.required' => 'messages.offer name in en is required',
                'name_ar.unique' =>'messages.offer in ar already exist',
                'name_en.unique' =>'messages.offer in en already exist',
                'price.required' =>'messages.price is required',
                'details_ar.required' =>'messages.details in ar is required',
                'details_en.required' =>'messages.details in en is required',
        ];
}
public function getAllOffers(){
            $offers=  Offer::select('id','name_'.LaravelLocalization::getCurrentLocale(),'price','details_'.LaravelLocalization::getCurrentLocale())->get();
                return view('offers.all',compact('offers'));     
}

}
