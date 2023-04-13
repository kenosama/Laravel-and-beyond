@extends('admin.admin')
@section('title', $property->exist ? "Edit a Property | Administration" : "Create a Property | Administration")

@section('content')
    
<h1>@yield('title')</h1>

@endsection
