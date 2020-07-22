<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestoOrderController extends Controller
{
    public function index($id){

    $resto = Restaurant::find($id);
    if(!$resto){
        abort(404,'The restaurant is not find');
    }
    $orders = Order::where('resto_id',$id)->orderBy('isComplete')->orderByDesc('created_at')->paginate(100);
    return view('orders.order-index')
    ->with('orders',$orders)
    ->with('resto',$resto);

    }

    public function add($id){
    $resto = Restaurant::find($id);
    return view('orders.order-add')->with('resto',$resto);
    }
     public function store(Request $request)
    {
    $postData = $this->validate($request,[
    'order_data' => 'required|array'

    ]);
    $items=$postData['order_data']['orderedItems'];
    try{
    DB::beginTransaction();
    $orderTotal = 0;
    foreach($items as $id){
    $menu = Menu::where('resto_id',$request->input('resto_id'))
                  ->where('id',$id)
                  ->first();
                  if($menu){
                  $orderTotal +=$menu->price;
                  }
                  }  
           $order = Order::create([
               'resto_id' => $request->input('resto_id'),
               'user_id' =>Auth::user()->id,
               'amount' => $orderTotal,
               'isComplete' => 0,
               'order_details' =>
               [
               'items' =>$postData['order_data']['orderedItems'],
               'customer_name' => $postData['order_data']['customerDetails']['name'],
               'customer_phone' => $postData['order_data']['customerDetails']['phone'],
               'customer_address' => $postData['order_data']['customerDetails']['address']
               ]
               ]);
               DB::commit();
               $order->save();

    }catch(\Exception $e){
   
    return response()->json($e->getMessage(),200);
    DB::rollBack();
    }
    return response()->json($order,200);
    }
}
