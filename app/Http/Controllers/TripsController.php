<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Trip;
use App\Models\Category;
use App\Models\tripType;
use App\Models\TripDetails;

use Symfony\Contracts\Service\Attribute\Required;

class TripsController extends Controller
{
    public function index(){
        $Trips=Trip::all();
        $categories=Category::all();
        return view('Admin.trip.index',compact('Trips','categories'));
    }

    public function create(){
        $trips = Trip::pluck('trip_title','id');

        //           ->where('id', $request->id)
        $categories=Category::pluck('title','id');
        //  $tripTypes=tripType::pluck('type','id');
         $seasons = ['Spring','Autumn','Summer','Winter'];

        //  $var =[
        //      [1 => 'Exploration'],
        //      [2=>'Activities'],
        //      [3=>'Therapy'],
        //      [4=>'Recovery'],
        //      [5=>'Luxury'],
        //      [6=>'Adventure'],
        //      [7=>'education']
        //  ];
         $tripTypes = ['Exploration','Activities','Therapy','Recovery',
         'Luxury ','Adventure ','education','honeyMoon','Friends','Family'];

        //  $tripTypes=collect([$var ?: '']);
        //  $tripTypes->implode(',');
        //  $trip_type = implode(',',[$trip->tripType]);

        // $rr=  $tripTypes->implode('season',',');
        //  $tripTypes=unserialize($tripType);


        return view('Admin.trip.create',compact(['categories','tripTypes','seasons','trips']));
    }

    public function store(Request $request)

    {


        //  $formInput=$request->except('image');

        $this->validate($request,[


            'trip_title'=>'required',
            'trip_price'=>'required|integer',
            'activities'=>'required',
            'program'=>'required',
            'duration'=>'required|integer',
            'season'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000|required',
            'category'=>'required',
            'tripType'=>'required',
            'from'=>'required',
            'to'=>'required',
        ]);

        //  $trip_type = implode(',', $request['tripType']);
    //   $trip_type=base64_encode(serialize($request['tripType']));

        //  $trip_type = implode(',', $request->input('tripType');

        $trip_type = json_encode($request['tripType'],1);
        $category = json_encode($request['category'],1);


        $trip_title = $request->trip_title;
        // $category_id = $request->category_id;
        $trip_price = $request->trip_price;
        $activities = $request->activities;
        $program = $request->program;
        $season = $request->season;
        $duration = $request->duration;
        $from = $request->from;
        $to = $request->to;



        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            // $formInput['image']=$imageName;
        }





        // Trip::create($formInput);

       Trip::create([
            'trip_title' => $trip_title,

            'tripType' => $trip_type,

            'category_id' => $category,
            'trip_price' => $trip_price,
            'activities' => $activities,
            'program' => $program,
            'season'  =>$season,
            'duration'=>$duration,
            'image'=>$imageName,
            'from'=>$from,
            'to'=>$to,




        ]);

//         $trip_t = explode(',', $tripTypes);
// dd ($trip_t);


        $categories=Category::all();

        // return redirect()->route('admin.index');

        // return redirect()->back();

}

public function show($id)
    {
        $trips = Trip::findOrFail($id);
        // $blog = Blog::whereSlug($slug)->first();
        return view('trip.show', compact('trips'));
        // var_dump($product);
    }

    public function TripEditForm($id) {


        $Trips = Trip::findOrFail($id);
        $categories=Category::all();


        $seasons = ['Spring','Autumn','Summer','Winter'];
        $tripTypes = ['Exploration','Activities','Therapy','Recovery','Luxury ','Adventure ','education','honeyMoon','Friends','Family'];
        return view('Admin.trip.editTrips', compact('Trips', 'categories','seasons','tripTypes'));
    }



  public function editTrips(Request $request, $id) {


         $Trips = DB::table('trips')->where('id', '=', $id)->get();
        $tripId = $request->id;
        $trip_type = $request['tripType'];
        $trip_title = $request->trip_title;
        $category = $request['category'];
        $trip_price = $request->trip_price;
        $activities = $request->activities;
        $program = $request->program;
        $season = $request->season;
        $duration = $request->duration;
        $from = $request->from;
        $to = $request->to;





        DB::table('trips')->where('id', $tripId)->update([
            'trip_title' => $trip_title,
            'tripType' => $trip_type,
            'category_id' => $category,
            'trip_price' => $trip_price,
            'activities' => $activities,
            'program' => $program,
            'season'  =>$season,
            'duration'=>$duration,
            'from'=>$from,
            'to'=>$to,



        ]);
       return view('admin.trip.index', compact('Trips'));




    }


     public function ImageEditForm($id) {

        $Trips = Trip::findOrFail($id);

        return view('admin.trip.ImageEditForm', compact('Trips'));
    }

 public function editTripImage(Request $request) {


        $tripId = $request->id;


        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }





        DB::table('trips')->where('id', $tripId)->update(['image' => $imageName]);


        return redirect()->back();





    }










 public function uploadSubmit(Request $request)
{


    $this->validate($request,[


        'trip_id'=>'required',
         'fileName'=>'image|mimes:png,jpg,jpeg|max:200000',



    ]);

//    $trip_id= $request->trip_id;

// dd($trips);

    $input=$request->images;
    $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('image',$name);
            $images[]=$name;
        }
    }
    /*Insert your data*/

    TripDetails::insert( [
        // 'fileName'=>json_encode($images[],1);
        'fileName'=> json_encode($images),

    //   'fileName'=>  implode("|",$images),
        //  'trip_id' =>$trips[id],
         'trip_id'=>$request->trip_id,
        //you can put other insertion here
    ]);




























}



public function search(Request $request)
    {
    $dateFrom = $request->get('dateFrom');
    $dateTo = $request->get('dateTo');


    $trips = DB::table('trips')->whereBetween('from',[$dateFrom,$dateTo])->get();
    // ->where('from', '>=',  $date)
    //  ->where( 'to' ,'<=',  $date)->get(;)
    return view('front.search', compact('trips'));
}


    public function destroy($id)
    {

          Trip::findOrFail($id)->delete();

        return redirect()->back();
    }









}
