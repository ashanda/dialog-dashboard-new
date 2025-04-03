@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
  
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center">{{ __('Edit Image') }}</div>
  
                  <div class="card-body">
    <form action="{{ route('fishers.update', $fisher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $fisher->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Language</label>
            <select name="language" class="form-control" required>
                <option value="">Select Language</option>
                <option value="English" {{ old('language', $fisher->language) == 'English' ? 'selected' : '' }}>English</option>
                <option value="Sinhala" {{ old('language', $fisher->language) == 'Sinhala' ? 'selected' : '' }}>Sinhala</option>
                <option value="Tamil" {{ old('language', $fisher->language) == 'Tamil' ? 'selected' : '' }}>Tamil</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            <img src="{{ asset('storage/'.$fisher->image) }}" width="100" alt="Fisher Image">
        </div>
        <div class="mb-3">
            <label class="form-label">New Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
