@extends('base')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
         <h1>Agence Lorem ipsum</h1>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio saepe iure accusamus possimus cumque ullam sequi molestiae libero earum iusto, a, veritatis dolor! Fugit rem magnam hic qui assumenda sint?
        </p>
    </div>

    <div class="container">
        <h2>Our Last Properties</h2>
        <div class="row">
            @foreach ($properties as $property)
            <div class="col">
                @include('property.card')
            </div>
                
            @endforeach
        </div>
    </div>
</div>
   
@endsection