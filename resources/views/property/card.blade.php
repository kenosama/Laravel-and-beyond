<div class="card">
<a href="{{route('property.show', [
                'slug' => $property->getSlug(),
                'property'=>$property
                ])}}">
    <div class="position-relative w-100">
    @if($property->getPicture())
        
        <img src="{{ $property->getPicture()->getImageUrl(360, 230) }}" alt="" class="w-100">
    @else
        <img src="/empty.jpg" class="w-100" alt="">
    @endif
            @if($property->sold)
        <div class="alert alert-danger position-absolute bottom-0 w-100 start-0">
            Already sold by <span class="fw-bold">The Agency</span>
        </div>
        @endif
    </div>
    <div class="card-body">
        <h5 class="card-title">
            
            {{$property->title}} 
</a>
        </h5>
        <p class="card-text">
            {{$property->surface}}m2 - {{$property->city}} - ({{$property->postal_code}})
        </p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
        {{number_format($property->price, thousands_separator: ' ') }}€</div>


    </div>
</div>