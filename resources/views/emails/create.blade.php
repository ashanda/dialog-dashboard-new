@extends('layouts.master')


@section('content')
<div class="container">
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
  
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center">{{ __('Add New Email') }}</div>
  
                  <div class="card-body">
                    <form action="{{ route('emails.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('emails.index') }}" class="btn btn-secondary">Back</a>
                    </form>
    </div>
</div>
</div>
</div>
</div>
@endsection
