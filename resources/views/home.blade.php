@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <menu-container :items="{{ json_encode($categories) }}"></menu-container>
    </div>
</div>
@endsection
