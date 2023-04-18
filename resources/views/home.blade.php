@extends('base')

@section('content')
@php
        $route = request()->route()->getName();
@endphp

<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
         <h1>The Agency</h1>
        <p>
            Welcome to The Agency! We are dedicated to helping you find your dream home or investment property. Whether you're searching for a cozy apartment in the heart of the city, a luxurious villa by the sea, or a commercial property to grow your business, we have the expertise and resources to make your property search a success.
        </p>
        <p>
Our team of experienced and knowledgeable agents is committed to providing personalized service and support every step of the way. We understand that buying or selling a property can be a complex and emotional process, and we are here to guide you through it with ease and professionalism.
        </p>
        <p>
At our agency, we believe that communication and transparency are essential for building trust and long-term relationships with our clients. That's why we prioritize clear and honest communication, keeping you informed and updated throughout the entire process.
        </p><p>
Whether you're a first-time buyer or a seasoned investor, we're here to help you make informed decisions and achieve your real estate goals. So why wait? Contact us today to start your property journey with a team you can trust.
        </p>
    </div>

    <div class="container">
        <h2 class="mb-5">Our Last Properties</h2>
        <div class="row">
            @foreach ($properties as $property)
            <div class="col">
                @include('property.card')
            </div>
            @endforeach

            <a href="{{ route('property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>
                <button class="btn btn-primary mt-5" type="button" disabled>
  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  <span class="">Discover your new home from our Properties</span>
</button>

            </a>
        </div>
    </div>
    
</div>
   
@endsection