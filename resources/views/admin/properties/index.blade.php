@extends('admin.admin')

@section('title', 'All the Properties')
@section('content')
<div class="d-flex justify-content-between align-item-center">
    <h1>@yield('title')</h1>
    <a href="{{route('admin.property.create')}}" class="btn btn-primary">Add a proprety</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Surface</th>
            <th>Price</th>
            <th>City</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($properties as $property)
        <tr>
            <td>{{$property->title}}</td>
            <td>{{$property->surface}} m²</td>
            <td>{{number_format($property->price, thousands_separator: ' ')}}</td>
            <td>{{$property->city}}</td>
            <td>TODO: add actions later</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$properties->links()}}
@endsection