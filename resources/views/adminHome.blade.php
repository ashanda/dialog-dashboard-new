@extends('layouts.master')

@section('dashboard')

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">All Loctaion</h5>
                      <span class="h2 font-weight-bold mb-0">{{ all_location() }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-map-pin"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">All users</h5>
                      <span class="h2 font-weight-bold mb-0">{{ all_user() }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Add New User</h5>
                      <a href="{{ route('admin.register') }}"><span class="h2 font-weight-bold mb-0">+ New User</span></a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Add New Location</h5>
                      <a href="{{ route('habour-location.create')}}"><span class="h2 font-weight-bold mb-0">+ New Location</span></a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-map"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            
                <style type="text/css">

        #map {

          height: 500px;
          width: 100%;

        }

    </style>
               

       
        <div id="map"></div>

   
          </div>
        </div>
      <div class="col-xl-4  align-items-center">
  <div class="card shadow h-100">
    <div class="card-body">
      <!-- Chart -->
      <div class="chart d-flex justify-content-center align-items-center">
        <img src="{{ asset('assets/img/theme/sayuru-thumb.jpg') }}" alt="">
      </div>
    </div>
  </div>
</div>

      </div>
      <div class="row mt-5">
        
       
      
@endsection

@section('scripts_links')


<script>
    function initMap() {
        const sriLankaBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(5.916667, 79.500000), // Southwest corner of Sri Lanka
            new google.maps.LatLng(9.969264, 81.890718)  // Northeast corner of Sri Lanka
        );

        const mapOptions = {
            zoom: 7,
            center: { lat: 7.202384607626241, lng: 80.7718 }, // Set an appropriate center for the initial map view
            restriction: {
                latLngBounds: sriLankaBounds,
                strictBounds: false
            }
        };

        const map = new google.maps.Map(document.getElementById("map"), mapOptions);
        
        // Your JSON data (replace this with your actual JSON data)
        const jsonData = {!! $location_json !!};
        console.log(jsonData);
        
        // Loop through each item in the JSON data and add markers
        jsonData.forEach(item => {
            const latLng = new google.maps.LatLng(parseFloat(item['lat ']), parseFloat(item['lng']));
            const marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: "Marker Title", // Change this to set the marker title for each item
               
            });

            // You can also add info windows or other customizations for each marker
            const infowindow = new google.maps.InfoWindow({
                content: "Marker Content", // Change this to set the marker content for each item
            });

            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
        });
    }
</script>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
@endsection