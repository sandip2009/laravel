<?php

namespace App\Http\Controllers;

use App\energy_providers;
use Illuminate\Http\Request;
use Validator;

class EnergyProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\energy_providers  $energy_providers
     * @return \Illuminate\Http\Response
     */
    public function show(energy_providers $energy_providers,$id,$name,$product_variation)
    {
        //
        $product = $energy_providers->where(['provider_name'=>$id,"product_name"=>$name,"product_variation"=>$product_variation])->get();
 
        if ($product->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'product name with  ' . $name . ' not found'." in energy providers ".$id
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $product->toArray()
        ], 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\energy_providers  $energy_providers
     * @return \Illuminate\Http\Response
     */
    public function edit(energy_providers $energy_providers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\energy_providers  $energy_providers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, energy_providers $energy_providers,$id)
    {
        //

        $input = $request->all();
        //print_r($input);exit;

        $energy_providers = energy_providers::find($id);
 


        $validator = Validator::make($input, [
            'provider_name' => 'required',
            'product_name' => 'required',
            'product_variation' => 'required',
            'monthly_price_new' => 'required',
        ]);




        if ($validator->fails()) { 

            return response()->json(['error'=>$validator->errors()], 401);            
        }


        $energy_providers->provider_name = $input['provider_name'];
        $energy_providers->product_name = $input['product_name'];
        $energy_providers->product_variation=$input['product_variation'];
        $energy_providers->monthly_price=$input['monthly_price_new'];

        $energy_providers->save();

        return response()->json(['Product updated successfully'=>$energy_providers->toArray()], 401);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\energy_providers  $energy_providers
     * @return \Illuminate\Http\Response
     */
    public function destroy(energy_providers $energy_providers)
    {
        //
    }
}
