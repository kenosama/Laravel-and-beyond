@extends('admin.admin')
@section('title', $property->exist ? "Edit a Property | Administration" : "Create a Property | Administration")

@section('content')
    
<h1>@yield('title')</h1>
<form class="vstack gap-2" action="{{route($property->exist ? 'admin.property.update ' : 'admin.property.store', $property) }}" method="POST">
@csrf
@method($property->exist ? 'put': 'post')

    <div class="row">
        @include('shared.input', ['class'=>'col', 'label'=>'Title', 'name'=>'title', 'value'=>$property->title])
        <div class="col row">
            @include('shared.input', ['class'=>'col', 'name'=>'surface', 'value'=>$property->surface])
            @include('shared.input', ['class'=>'col', 'name'=>'price', 'value'=>$property->price])
        </div>
    </div>
@include('shared.input', ['type'=>'textarea', 'name'=>'description', 'value'=>$property->description])
<div class="row">
    @include('shared.input', ['class'=>'col', 'name'=>'rooms', 'value'=>$property->rooms])
    @include('shared.input', ['class'=>'col', 'name'=>'bedrooms', 'value'=>$property->bedrooms])
    @include('shared.input', ['class'=>'col', 'name'=>'floor', 'value'=>$property->floor])
</div>
<div class="row">
    @include('shared.input', ['class'=>'col', 'name'=>'address', 'value'=>$property->address])
    @include('shared.input', ['class'=>'col', 'name'=>'city', 'value'=>$property->city])
    @include('shared.input', ['class'=>'col','label'=>'Postal Code' ,'name'=>'postal_code', 'value'=>$property->postal_code])
</div>

<div>
    <button class="btn btn-primary">
        @if($property->exist)
            Modify
        @else 
            Create
        @endif
    </button>
</div>
</form>
@endsection
