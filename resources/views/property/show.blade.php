@extends('base')
@section('title', $property->title)

@section('content')
<div class="container mt-4">
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
    <h4>Interessted? </h4>
    <form action="" method="post" class="vstack gap-3">
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
        <div class="btn btn-primary">
            Contact us
        </div>
    </form>
</div>

<div class="mt-4">
    <h2>Description</h2>
    <p>{{nl2br($property->description)}}</p>
    <div class="row">
        <div class="col-8">
            <h2>Caracteristics</h2>
            <table class="table table-striped">
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