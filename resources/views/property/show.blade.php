@extends('base')
@section('title', $property->title)

@section('content')
<div class="container mt-4">
<div class="row">
    <div class="col-8">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 800px">
            <div class="carousel-inner">
                @foreach ($property->pictures as $k=>$picture)
                    <div class="carousel-item {{$k===0 ? 'active':''}}">
                    <img src="{{$picture->getImageUrl()}}" alt="">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-4">
            <h1>
    {{$property->title}}
</h1>
<h2>
    {{$property->rooms}} Rooms | {{ $property->surface}} m2 
</h2>

<div class="text-primary fw-bold" style="font-size: 4rem">
{{number_format($property->price, thousands_separator: ' ')}}€</div>
    
<hr>

<div class="mt-4">
    @include('shared.flash')

    @if(session('success'))
    @else
       <h4>Interessted? </h4>
     <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
        @csrf
        <div class="row">
            @include('shared.input', ['class'=>'col', 'name'=>'firstname', 'label'=>'First Name:'])
            @include('shared.input', ['class'=>'col', 'name'=>'lastname', 'label'=>'Last Name:'])
        </div>
        <div class="row">
            @include('shared.input', ['class'=>'col', 'name'=>'phone', 'label'=>'Phone Number'])
            @include('shared.input', ['type'=>'email','class'=>'col', 'name'=>'email', 'label'=>'Email:'])
        </div>
        @include('shared.input', ['type'=>'textarea','class'=>'col', 'name'=>'message', 'label'=>'Your message:'])
        <button class="btn btn-primary">
            Contact us
        </button>
    </form> 
    @endif
    
    </div>
</div>
</div>

<div class="mt-4">
    <h2>Description</h2>
    <p>{!! nl2br(e($property->description)) !!}</p> 
    <div class="row">
        <div class="col-8">
            <h2>Caracteristics</h2>
            <table class="table table-striped">
                <tr>
                    <td>Localisation</td>
                    <td>
                        {{$property->address}} <br/>
                        {{$property->city}}  ({{$property->postal_code}})
                    </td>
                </tr>
                <tr>
                    <td>Living Surface</td>
                    <td>{{$property->surface}}m2</td>
                </tr>
                <tr>
                    <td>number of Rooms</td>
                    <td>{{$property->rooms}}</td>
                </tr>
                <tr>
                    <td>number of Bedrooms</td>
                    <td>{{$property->bedrooms}}</td>
                </tr>
                <tr>
                    <td>Floor</td>
                    <td>{{$property->floor}}</td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <h2>Specificity</h2>
            <ul class="list-group">
                @foreach ($property->options as $option)
                    <li class="list-group-item">{{$option->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

</div>


@endsection