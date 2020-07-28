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
    <manage-orders :orders="{{json_encode($orders)}}"></manage-orders>
    </div>
    </div>
</div>
@endsection
