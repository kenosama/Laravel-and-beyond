@php
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class, "mb-3"])>
    <label for="{{$name}}">
        {{$label}}
    </label>
    @if ($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror"  name="{{$name}}">{{ old($name, $value)}}</textarea>
    @else
    <input class="form-control @error($name) is-invalid @enderror" type="{{$type}}" name="{{$name}}" value=" {{ old($name, $value)}}">
    @error($name)
    <div class="invalid-feedback">
        {{$message }}
    </div>
    @enderror
    @endif
</div>