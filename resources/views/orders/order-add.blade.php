@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row ">
    <div class="col-md-12">
    <h2>Home delivery Order for {{ $resto->name }}</h2>
    
    </div>
    </div>

    <div class="row">
    <div class="col-md-12">
    <order-group :resto-id="{{ $resto->id }}"></order-group>
    </div>
    </div>
</div>
@endsection
