<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Trip;
use App\Models\tripType;

class CategoriesController extends Controller
{
    public function index(){

        $trips=Trip::all();
        $categories=Category::all();
        return view('Admin.category',compact(['categories','trips']));
    }

    public function create(){


    }

    public function store(Request $request)
    {


        $formInput=$request->except('image');

        $this->validate($request,[


        'title'=>'required',
        'image'=>'image|mimes:png,jpg,jpeg|max:20000|required',

        ]);



        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }

        Category::create($formInput);
        // return redirect()->route('admin.index');
        return redirect()->back();














    }

    public function show($id)
    {
        $categories=Category::all();
        return view('admin.category',compact(['categories']));
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

         Category::findOrFail($id)->delete();

        return redirect()->back();
    }


}
