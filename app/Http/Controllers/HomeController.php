<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Category;
use App\Models\City;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $trips=Trip::all();
        $cities=City::all();
        $categories=Category::all();
        $slides = array(
            'Burj-Khalifa-Dubai.jpg',
            'Paris.jpg',
            'Russia.jpg',
            'Sharm ElSheikh-Egypt.jpg',
            'Temple-Luxor-Egypt.jpg',
            'Paris-France.jpg',
            'Swisra.jpg',
            'Aswan-Egypt.jpg',
            'Humburg.jpg',
            'ForestCity-Malaysia.jpg',
            'Diving-RedSea-Egypt.jpg',
            'Kreet.jpg',
            'Egypt-om-ElDoNia.jpg',
            'tokyo-street-crossing.jpg',
            'sphinx-Egypt.jpg',
            'Barcelona-Aspania.jpg',

        );
 $tripTypes=Array(
    "1" =>array('travel-exploration.jpg',"Exploration"),
    "2" =>array('activities travels.jpg',"Activities"),
    "3" =>array('medical travel.jpg',"Therapy"),
    "4" =>array('recovery.jpg',"Recovery"),
    "5" =>array('luxury.jpg',"Luxury"),
    "6" =>array('Adventure.jpg',"Adventure"),
    "7" =>array('Travel-Best-form-of-Educaiton.jpg',"education"),
    "8" =>array('honeymoon travels.jpg',"honeyMoon"),
    "9" =>array('friends travels.jpg',"Friends"),
    "10" =>array('family travels.jpg',"Family"),


) ;

        return view('front.home',compact(['trips','categories','slides','tripTypes']));
    }




    public function trip_details($id)


    {
          $items=Trip::all();
     // $products = DB::table('products')->where('id',$id)->get();

           // return view('front.product_details', compact('products'));
        // if(Auth::check()){
        // $recommends = new recommends;
        // $recommends ->uid = Auth::user()->id;
        // $recommends ->pro_id = $id;
        // $recommends ->save();
        // }

        // $products = Product::findOrFail($id);

        // return view('front.product_details', compact('products'));
       //$items=DB::table('products')->orderby('id','desc')->get();


         $Trips = DB::table('trips')->where('id',$id)->get();
         $seasons = ['Spring','Autumn','Summer','Winter'];

         $tripTypes = ['Exploration','Activities','Therapy','Recovery','Luxury ','Adventure','education','honeyMoon','Friends','Family'];
         $tripDetails=DB::table('trip_details')->where('trip_id',$id)->get();
        return view('front.trip_details', compact('Trips','items','seasons','tripTypes','tripDetails'));




    }
    public function show($id)
    {
         $category = Category::findOrFail($id);
        $trips = DB::table('trips')->where('category_id', 'LIKE', "%{$id}%")->get();
        return view('front.allTrips',compact(['category','trips']));
    }
    public function allTripTypes($name)
    {
        $trips = DB::table('trips')->where(('tripType'), 'LIKE', "%{$name}%")->get();
        return view('front.allTripType',compact(['trips']));
    }








public function wishlist(Request $request) {

    $wishList = new WishList;
    $wishList->user_id = Auth::user()->id;
    $wishList->trip_id = $request->trip_id;

    $wishList->save();
    $Trips=Trip::all();
    $items=WishList::count();

    $trips = DB::table('trips')->where('id', $request->trip_id)->get();

    return back();

}

public function View_wishList() {
    $trips = DB::table('wishlist')->where('user_id',Auth::user()->id)->leftJoin('trips', 'wishlist.trip_id', '=', 'trips.id')->get();



    return view('front.wishList', compact('trips'));
}

public function removeWishList($id) {

    DB::table('wishlist')->where('trip_id', '=', $id)->delete();

    return back()->with('msg', 'Item Removed from Wishlist');
}


}



