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
    <form action="{{route('property.contact', $property)}}" method="post" class="vstack gap-3">
        @csrf
        <div class="row">
            @include('shared.input', ['class'=>'col', 'name'=>'firstname', 'label'=>'First Name:', 'value'=>'John'])
            @include('shared.input', ['class'=>'col', 'name'=>'lastname', 'label'=>'Last Name:', 'value'=>'Doe'])
        </div>
        <div class="row">
            @include('shared.input', ['class'=>'col', 'name'=>'phone', 'label'=>'Phone Number', 'value'=>'0476 00 00 00'])
            @include('shared.input', ['type'=>'email','class'=>'col', 'name'=>'email', 'label'=>'Email:', 'value'=>'john@doepublic.be'])
        </div>
        @include('shared.input', ['type'=>'textarea','class'=>'col', 'name'=>'message', 'label'=>'Your message:', 'value'=>'My Little message for the Agency'])
        <div class="btn btn-primary">
            Contact us
        </div>
    </form>
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