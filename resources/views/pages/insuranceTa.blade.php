@extends('layouts.auth')
@section('content')

<div class="container-fluid mt-6">
  <div class="text-center text-muted mb-4">
    <h1 class="text-white fw-bold" style="font-size: 40px">சயூரு காப்பீட்டு தயாரிப்பு</h1>
  </div>
  
  <div class="row justify-content-center">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-12">
      <div class="card p-3">
        <!-- Card Body -->
        <div class="card-body">
          <p class="card-text" style="font-size: 20px; font-weight: 600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero.</p>
          <form action="{{ route('insurances.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label text-dark">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label text-dark">Contact Number</label>
                <input type="text" class="form-control" id="contact" name="contact" required 
                       pattern="^0\d{9}$" maxlength="10" placeholder="Please enter a 10-digit contact number starting with 0." title="Please enter a 10-digit contact number starting with 0.">
              </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Submit Your Details</button>
            </div>
          </form>
        </div>
        <!-- Card Footer -->
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts_links')
     
<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
