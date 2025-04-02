@extends('layouts.auth')
@section('content')

<div class="container-fluid mt-6">
  <div class="text-center text-muted mb-4">
    <h1 class="text-white fw-bold" style="font-size: 40px">සුළි කුණාටු රක්‍ෂණය</h1>
  </div>
  
  <div class="row justify-content-center">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-12">
      <div class="card p-3">
        <!-- Card Body -->
        <div class="card-body">
          <p class="card-text text-center" style="font-size: 20px; font-weight: 600">HNB ජෙනරල් ඉන්ෂුවරන්ස් වෙතින් ධීවරයන් සඳහා ලබා දෙන සුළි කුණාටු රක්‍ෂණය, සුළි කුණාටු සම්බන්ධ ආර්ථික අවදානම් අවම කිරීම සඳහා නව්‍ය විසඳුමකි.. මෙහි ගෙවීම් ව්‍යුහය විශේෂිත ලෙස අර්ථ දක්වා ඇත්තේ සුළි කුණාටුවේ , උපරිම සුළං වේගය සහ රක්ෂිත ස්ථානය හා සුළි කුණාටුවේ  උපරිම සුළං වේගය වාර්ථාවන ලක්ෂ්‍ය  අතර දුර යන ප්‍රධාන පරාමිතීන් දෙක මගිනි.  මෙම සාධක දෙක මත වන්දි හිමිකම් ගෙවීම් ප්‍රමාණය තීරණය කිරිම මගින්   සාධාරණ හා පාරදෘශ්‍ය ක්‍රියාවලියක් අනුව වන්දි අගය තහවුරු කරයි. සුළි කුණාටුවේ වේගය ඉහළ යන තරමට සහ එහි බලපෑම ආසන්න තරමට, වන්දි ගෙවීම් අගයද වැඩි වේ.</p>
          <p class="card-text text-center mb-4" style="font-size: 20px; font-weight: 400">මෙම සේවාව පිළිබඳව වැඩි විස්තර දැනගැනීම සඳහා පහත කරුණු පුරවන්න.</p>
          <form action="{{ route('insurances.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label text-dark">නම</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label text-dark">දුරකථන අංකය</label>
                <input type="text" class="form-control" id="contact" name="contact" required 
                       pattern="^0\d{9}$" maxlength="10" placeholder="Please enter a 10-digit contact number starting with 0." title="Please enter a 10-digit contact number starting with 0.">
              </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          <p class="card-text text-center mt-4" style="font-size: 20px; font-weight: 400">අපගේ නියෝජිතයෙක් ඔබ සමඟ සම්බන්ධ වනු ඇත</p>
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
