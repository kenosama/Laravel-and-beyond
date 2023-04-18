@extends('admin.admin')
@section('title', $property->exists ? "Edit a Property | Administration" : "Create a Property | Administration")

@section('content')
    
<h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post" enctype="multipart/form-data">

        @csrf
        {{-- if you don't specify the method here, then the update will never work. --}}
        @method($property->exists ? 'put' : 'post')

    <div class="row">
        <div class="col vstack gap-2" style="flex: 100">
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
        @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options()->pluck('id'), 'multiple' => true])
        @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $property->sold, 'options' => $options])
    


        </div>
        <div class="col vstack gap-3" style="flex: 25">

            @foreach ($property->pictures as $picture)
                
                <div id="picture{{$picture->id}}" class="position-relative">
                <img src="{{$picture->getImageUrl()}}" alt="" class="w-100 d-block">
                <button type="button" class="btn btn-danger position-absolute bottom-0 w-100 start-0"
                    hx-delete="{{route('admin.picture.destroy', $picture)}}"
                    hx-target="#picture{{$picture->id}}"
                    hx-swap="delete"
                >
                <span class="htmx-indicator spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Delete Image</button>
                </div>
            @endforeach

            @include('shared.upload', ['name' => 'pictures', 'label' => 'Pictures:', 'multiple' => true])
        </div>
    </div>
<div>
    <button class="btn btn-primary">
        @if($property->exists)
            Modify
        @else 
            Create
        @endif
    </button>
</div>
</form>
@endsection
