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
            <input type="text" name="sinhala_name" class="form-control" value="{{ $fisher->sinhala_name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">English Name</label>
            <input type="text" name="english_name" class="form-control" value="{{ $fisher->english_name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tamil Name</label>
            <input type="text" name="tamil_name" class="form-control" value="{{ $fisher->tamil_name }}" required>
        </div>
        {{-- <div class="mb-3">
            <label class="form-label">Language</label>
            <select name="language" class="form-control" required>
                <option value="">Select Language</option>
                <option value="English" {{ old('language', $fisher->language) == 'English' ? 'selected' : '' }}>English</option>
                <option value="Sinhala" {{ old('language', $fisher->language) == 'Sinhala' ? 'selected' : '' }}>Sinhala</option>
                <option value="Tamil" {{ old('language', $fisher->language) == 'Tamil' ? 'selected' : '' }}>Tamil</option>
            </select>
        </div> --}}
       {{-- ✅ Current Images Section --}}
        <div class="mb-3">
            <label class="form-label d-block">Current Images</label>
            <div class="d-flex flex-wrap gap-3">
                @for($i = 1; $i <= 5; $i++)
                    @php $field = 'image_day' . $i; @endphp
                    <div class="text-center">
                        <label class="form-label">Day {{ $i }}</label><br>
                        @if(!empty($fisher->$field))
                            <img src="{{ asset('storage/' . $fisher->$field) }}" width="100" class="rounded border mb-1" alt="Day {{ $i }} Image">
                        @else
                            <p class="text-muted">No image</p>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        {{-- ✅ Upload New Images Section --}}
        <div class="mb-3">
            <label class="form-label d-block">Upload New Images (Optional)</label>
            @for($i = 1; $i <= 5; $i++)
                <div class="mb-2">
                    <label class="form-label">Day {{ $i }} Image</label>
                    <input type="file" name="image_day{{ $i }}" class="form-control">
                </div>
            @endfor
        </div>

        {{-- ✅ Submit Button --}}
        <button type="submit" class="btn btn-success">Update</button>

    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
