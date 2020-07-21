<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Order;
class RestoOrderController extends Controller
{
    public function index($id){

    $resto = Restaurant::find($id);
    if(!$resto){
        abort(404,'The restaurant is not find');
    }
    $orders = Order::where('resto_id',$id)->orderBy('isComplete')->paginate(40);
    return view('orders.order-index')
    ->with('orders',$orders)
    ->with('resto',$resto);

    }
}
