@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row ">
    <div class="col-md-12">
    <h2>Manage Orders for {{ $resto->name}}</h2>
    </div>
    </div>

    <div class="row">
    <div class="col-md-12">
    <a href="{{ route('orders.add',$resto->id) }}" class="btn btn-primary">Add Order</a>
    <table class="table table-striped table-hover table-bordered float-right" style="margin:10px;float:right">
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
</div>
@endsection
