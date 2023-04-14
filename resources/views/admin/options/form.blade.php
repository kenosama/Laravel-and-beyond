@extends('admin.admin')
@section('title', $option->exists ? "Edit a Option | Administration" : "Create a Option | Administration")

@section('content')
    
<h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">

        @csrf
        {{-- if you don't specify the method here, then the update will never work. --}}
        @method($option->exists ? 'put' : 'post')

    @include('shared.input', ['class'=>'col', 'name'=>'name', 'value'=>$option->name])

<div>
    <button class="btn btn-primary">
        @if($option->exists)
            Modify
        @else 
            Create
        @endif
    </button>
</div>
</form>
@endsection
