@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row ">
    <h2>Manage Orders</h2>
    <table class="table table-striped table-hover table-bordered">
    
    <tr>
    <thead>
    <th>Order Id</th>
    <th>Amount</th>
    <th>Status</th>
    <th>Customer Details</th>
    </thead>
    </tr>
   
    <tbody>
       @foreach($orders as $order)
       <tr>
      <td>{{$order->id}}</td>
      <td>{{$order->amount}}</td>
      <td>{{($order->isComplete) ? 'Completed' :'Incomplete'}}</td>
      <td>
      {{$order['order_details']['customer_name']}}<br>
      {{$order['order_details']['customer_phone']}}<br>
      {{$order['order_details']['customer_address']}}

      </td>
      </tr>
       @endforeach
       </tbody>
       </table>
    </div>
    
</div>
@endsection
