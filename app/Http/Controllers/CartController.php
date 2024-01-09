<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ConditionalRules;

use Illuminate\Http\Request;
use App\Models\Trip;



class CartController extends Controller
{


    public function index() {

        $cartItems =Cart::content();
        $trips = Trip::inRandomOrder()->limit(3)->get();


        return view('front.cart', compact('cartItems','trips'));
    }

    public function addItem( Request $request, $id) {
        $trip = Trip::find($id);
         Cart::add($id,$trip->trip_title,1,$trip->trip_price,['image' => $trip->image],);
          return back();




        }
    public function destroy($id){
        Cart::remove($id);
        $cartItems =Cart::content();
        return back();
    }


    public function update(Request $request,$rowId)

    {
         $cart = Cart::get($rowId);

        if(isset($request->qty))

        {
            $cart->qty = $request->qty;
        }

       return back()->with('success', 'Item quantity updated in your cart');

    }





}







