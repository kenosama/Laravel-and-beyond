@extends('base')
@section('title', 'All Our Properties')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($properties as $property)
            <div class="col-3">
                @include('property.card')
            </div>
                
            @endforeach
    </div>
</div>

<div class="my-4">
    {{$properties->links()}}
</div>
    
@endsection