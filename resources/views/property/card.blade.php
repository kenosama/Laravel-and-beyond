<div class="card">
    <div class="position-relative">
    @if($property->getPicture())
        
        <img src="{{$property->getPicture()->getImageUrl()}}" alt="" class="w-100">
    @else
        <img src="/empty.jpg" alt="">
    @endif
            @if($property->sold)
        <div class="alert alert-danger mt-2 position-absolute bottom-0 w-100 start-0">
            Already sold by <span class="fw-bold">The Agency</span>
        </div>
        @endif
    </div>
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('property.show', [
                'slug' => $property->getSlug(),
                'property'=>$property
                ])}}">
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