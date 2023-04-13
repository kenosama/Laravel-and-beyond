@extends('admin.admin')
@section('title', $property->exist ? "Edit a Property | Administration" : "Create a Property | Administration")

@section('content')
    
<h1>@yield('title')</h1>
<form action="{{route($property->exist ? 'admin.property.update ' : 'admin.property.store', $property) }}" method="POST">
@csrf
@method($property->exist ? 'put': 'post')

@include('shared.input', ['label'=>'Title', 'name'=>'title', 'value'=>$property->title])
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
