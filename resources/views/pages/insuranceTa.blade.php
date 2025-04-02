@extends('layouts.auth')
@section('content')

<div class="container-fluid mt-6">
  <div class="text-center text-muted mb-4">
    <h1 class="text-white fw-bold" style="font-size: 40px">சைக்க்லோன் குறியீட்டு காப்பீடு</h1>
  </div>
  
  <div class="row justify-content-center">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-12">
      <div class="card p-3">
        <!-- Card Body -->
        <div class="card-body">
          <p class="card-text text-center" style="font-size: 20px; font-weight: 600">மீனவர்களுக்கான HNB ஜெனரல் இன்சூரன்ஸ் நிறுவனத்தின் புயல் காப்பீடு, புயல்களுடன் தொடர்புடைய நிதி அபாயங்களைக் குறைப்பதற்கான ஒரு புதுமையான தீர்வாகும். கட்டண அமைப்பு குறிப்பாக இரண்டு முக்கிய அளவுருக்களின் அடிப்படையில் வடிவமைக்கப்பட்டுள்ளது: சூறாவளியின் அதிகபட்ச காற்றின் வேகம் மற்றும் காப்பீடு செய்யப்பட்ட இடத்திற்கும் அதிகபட்ச காற்றின் வேகம் பதிவு செய்யப்படும் இடத்திற்கும் இடையிலான தூரம். இந்த காரணிகளின் அடிப்படையில் உரிமைகோரல் கட்டணத் தொகையை தீர்மானிப்பதன் மூலம், ஒரு நியாயமான மற்றும் வெளிப்படையான செயல்முறை துல்லியமான இழப்பீட்டை உறுதி செய்கிறது. காற்றின் வேகம் அதிகமாகவும் தாக்கம் நெருக்கமாகவும் இருந்தால், இழப்பீட்டுத் தொகை அதிகமாகும்.</p>
          <p class="card-text text-center mb-4" style="font-size: 20px; font-weight: 400">இந்த சேவையைப் பற்றி மேலும் அறிய கீழே உள்ள விவரங்களை நிரப்பவும்.</p>
          <form action="{{ route('insurances.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label text-dark">பெயர்</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label text-dark">தொலைபேசி எண்</label>
                <input type="text" class="form-control" id="contact" name="contact" required 
                       pattern="^0\d{9}$" maxlength="10" placeholder="Please enter a 10-digit contact number starting with 0." title="Please enter a 10-digit contact number starting with 0.">
              </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          <p class="card-text text-center mt-4" style="font-size: 20px; font-weight: 400">எங்கள் பிரதிநிதி விரைவில் உங்களைத் தொடர்புகொள்வார்.</p>
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
