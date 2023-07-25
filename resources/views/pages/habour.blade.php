@extends('layouts.master')
@section('header_links')
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
@endsection
@section('dashboard')


@endsection

@section('content')
<div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                      
                      
                    </div>
          <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('habour-location.create') }}" class="btn btn-sm btn-neutral">Add New Habour Location</a>
          </div>

                    
                  </div>
          <div class="card shadow">
            
            <div class="card-header border-0">
              <div class="header-body">
                  
                </div>
              <h3 class="mb-0">Habour Locations</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Habour Location</th>
                    <th scope="col">Status</th>
                    <th scope="col">Last Updated</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($locations as $location)
                     <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{ $location->slug }}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> Active
                      </span>
                    </td>
                    <td>
                     {{ $location->updated_at }}
                    </td>
                    
                    <td class="text-left">
                       <input type="button" name="edit" value="Assign User" id="756" class="btn btn-default edit_data"> 
                      <a href="{{ route('habour-location.edit', $location->id) }}" class="btn btn-default edit_data">Edit</a>
                            <form action="{{ route('habour-location.destroy', $location->id) }}" id="delete-form" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-warning" onclick="confirmDelete()">Delete</button>

                            </form>
                     
                         <form id="delete-form" method="post" action="{{ route('habour-location.destroy', $location->id) }}">
    @csrf
    @method('DELETE')
    <!-- Add other form fields or inputs if needed -->
</form>

                    </td>
                    
                  </tr>
                  @endforeach
                 
                 
                 
                  
                 
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                  <ul class="pagination justify-content-end mb-0">
                      <!-- Render the previous page link -->
                      @if ($locations->onFirstPage())
                          <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1">
                                  <i class="fas fa-angle-left"></i>
                                  <span class="sr-only">Previous</span>
                              </a>
                          </li>
                      @else
                          <li class="page-item">
                              <a class="page-link" href="{{ $locations->previousPageUrl() }}" tabindex="-1">
                                  <i class="fas fa-angle-left"></i>
                                  <span class="sr-only">Previous</span>
                              </a>
                          </li>
                      @endif

                      <!-- Manually render the pagination links -->
                      @foreach ($locations as $page => $url)
                          @if ($page == $locations->currentPage())
                              <li class="page-item active">
                                  
                              </li>
                          @else
                              <li class="page-item">
                                  
                              </li>
                          @endif
                      @endforeach

                      <!-- Render the next page link -->
                      @if ($locations->hasMorePages())
                          <li class="page-item">
                              <a class="page-link" href="{{ $locations->nextPageUrl() }}">
                                  <i class="fas fa-angle-right"></i>
                                  <span class="sr-only">Next</span>
                              </a>
                          </li>
                      @else
                          <li class="page-item disabled">
                              <a class="page-link" href="#">
                                  <i class="fas fa-angle-right"></i>
                                  <span class="sr-only">Next</span>
                              </a>
                          </li>
                      @endif
                  </ul>
              </nav>


            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection

    @section('scripts_links')
     
<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
      <script>
      function confirmDelete() {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
          if (result.isConfirmed) {
            // If user confirms the delete action, submit the form
            document.getElementById('delete-form').submit();
          }
        });
      }
      </script>
    @endsection
