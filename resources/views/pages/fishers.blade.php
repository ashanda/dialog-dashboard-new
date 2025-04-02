@extends('layouts.auth')
@section('content')

<div class="container-fluid mt-6">
  <div class="text-center text-muted mb-4">
    <h1 class="text-white fw-bold" style="font-size: 40px">Potential Fishing Zones</h1>
    
  </div>
    <div class="row">
      @foreach ($allFishers as $fisher)
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
        <div class="card p-3">
            <!-- Card Header -->
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-white fw-bold" style="font-size: 22px;">{{ $fisher->name }}</h5>
            </div>

            <!-- Card Image -->
            <img src="{{ asset('storage/'.$fisher->image) }}" class="card-img-top" alt="Fisher Image">
            
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
