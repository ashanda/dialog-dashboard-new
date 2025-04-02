@extends('layouts.auth')
@section('content')

<div class="container-fluid mt-6">
  <div class="text-center text-muted mb-4">
    <h1 class="text-white fw-bold" style="font-size: 40px">Cyclone Index Insurance</h1>
  </div>
  
  <div class="row justify-content-center">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-12">
      <div class="card p-3">
        <!-- Card Body -->
        <div class="card-body">
          <p class="card-text text-center" style="font-size: 20px; font-weight: 600">HNB General Insurance's Cyclone Insurance for Fishermen is an innovative solution to minimize the financial risks associated with cyclones. The payment structure is specifically designed based on two key parameters: the maximum wind speed of the cyclone and the distance between the insured location and the point where the maximum wind speed is recorded. By determining the claim payment amount based on these factors, a fair and transparent process ensures accurate compensation. The higher the wind speed and the closer the impact, the greater the compensation amount.</p>
          <p class="card-text text-center mb-4" style="font-size: 20px; font-weight: 400">To learn more about this service, fill out the information below. </p>
          <form action="{{ route('insurances.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label text-dark">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label text-dark">Phone Number</label>
                <input type="text" class="form-control" id="contact" name="contact" required 
                       pattern="^0\d{9}$" maxlength="10" placeholder="Please enter a 10-digit contact number starting with 0." title="Please enter a 10-digit contact number starting with 0.">
              </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          <p class="card-text text-center mt-4" style="font-size: 20px; font-weight: 400">Our representative will contact you soon.</p>
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
