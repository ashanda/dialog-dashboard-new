@extends('layouts.auth')
@section('content')

<div class="container-fluid mt-6">
  <div class="text-center text-muted mb-4">
    <h1 class="text-white fw-bold" style="font-size: 40px">சைக்க்லோன் குறியீட்டு காப்பீடு</h1>
    
  </div>
    <div class="row">
      @foreach ($allFishers as $fisher)
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
        <div class="card p-3">
            <!-- Card Header -->
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-white fw-bold" style="font-size: 22px;">{{ $fisher->tamil_name }}</h5>
            </div>

            <!-- Card Image Slider -->
            @php
                $images = [];
                for ($i = 1; $i <= 5; $i++) {
                    $field = 'image_day' . $i;
                    if (!empty($fisher->$field)) {
                        $images[] = ['url' => asset('storage/' . $fisher->$field), 'day' => $i];
                    }
                }
            @endphp

            @if(count($images) > 0)
            <div id="fisherCarousel{{ $fisher->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($images as $index => $img)
                        <div class="carousel-item @if($index == 0) active @endif">
                            <img src="{{ $img['url'] }}" class="d-block w-100" alt="Day {{ $img['day'] }} Image">
                            <div class="carousel-caption d-none d-md-block">
                                <span class="badge bg-primary">Day {{ $img['day'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if(count($images) > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#fisherCarousel{{ $fisher->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#fisherCarousel{{ $fisher->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                @endif
            </div>
            @else
                <p class="text-center text-muted mt-3">No images available</p>
            @endif
            
            <!-- Card Footer -->
            <div class="card-footer text-center">
                <p class="mb-0 fw-bold">Last update - {{ $fisher->updated_at }}</p>
            </div>
        </div>
    </div>
@endforeach

    </div>
  </div>
@endsection
