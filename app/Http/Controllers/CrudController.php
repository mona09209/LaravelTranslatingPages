<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Lang\ar\messages;


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
                'name' =>$request->name,
                'price' =>$request->price,
                'details'=>$request->details
             ]);
             return redirect()->back()->with(['success'=>'Offer inserted successfully!']);

}
function GetRules(){
        return  $rules = [
                'name' => 'required|unique:offers',
                'price' => 'required|numeric',
                'details' => 'required',
        ];
}
 function GetMassages(){
        return  $messages = [
                'name.required' => 'messages.offer name is required',
                'name.unique' =>'messages.offer already exist',
                'price.required' =>'messages.price is required',
                'details.required' =>'messages.details is required',
        ];
}

}
