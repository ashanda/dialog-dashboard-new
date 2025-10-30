@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
  
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center">{{ __('Add Image') }}</div>
  
                  <div class="card-body">
    <form action="{{ route('fishers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Sinhala Name</label>
            <input type="text" name="sinhala_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">English Name</label>
            <input type="text" name="english_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tamil Name</label>
            <input type="text" name="tamil_name" class="form-control" required>
        </div>
        {{-- <div class="mb-3">
            <label class="form-label">Language</label>
            <select name="language" class="form-control" required>
                <option value="">Select Language</option>
                <option value="English">English</option>
                <option value="Sinhala">Sinhala</option>
                <option value="Tamil">Tamil</option> 
            </select>
        </div> --}}
        {{-- <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" required>
        </div> --}}
        {{-- ✅ Upload Images for Days 1 to 5 --}}
        @for($i = 1; $i <= 5; $i++)
            <div class="mb-3">
                <label class="form-label">Image for Day {{ $i }}</label>
                <input type="file" name="image_day{{ $i }}" class="form-control">
            </div>
        @endfor
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>
</div>
</div>
</div>
</div>
@endsection