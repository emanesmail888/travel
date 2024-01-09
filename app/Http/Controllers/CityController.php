<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index(){

        $cities=City::all();
        return view('Admin.city',compact(['cities']));
    }

    public function create(){


    }

    public function store(Request $request)
    {


        $formInput=$request->all();

        $this->validate($request,[


        'name'=>'required',

        ]);




        City::create($formInput);
        // return redirect()->route('admin.index');
        return redirect()->back();














    }

    public function show($id)
    {

        // $products=Category::find($id)->products;
        $cities=City::all();
        return view('admin.city',compact(['cities']));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

         City::findOrFail($id)->delete();

        return redirect()->back();
    }


}


