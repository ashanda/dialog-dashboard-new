@extends('layouts.master')
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
              <a href="{{ route('admin.register') }}" class="btn btn-sm btn-neutral">Add New Users</a>
          </div>

                    
                  </div>
          <div class="card shadow">
            
            <div class="card-header border-0">
              <div class="header-body">
                  
                </div>
              <h3 class="mb-0">All Users</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                     <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{ $user->name }}</span>
                        </div>
                      </div>
                    </th>
                   
                    <td>
                     {{ $user->email }}
                    </td>
                     <td>
                      
                      @if ( $user->type == 'admin' )
                        {{ 'Admin' }}
                      @else
                        {{ 'Location manager' }}
                      @endif
                    
                    </td>
                     <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> Active
                      </span>
                    </td>
                    <td class="text-left">
                                                 
                         <a href="{{ route('admin.users_edit', $user->id) }}" class="btn btn-default edit_data">Edit</a>
                            <form action="{{ route('admin.users_destroy', $user->id) }}" id="delete-form" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-warning" onclick="confirmDelete()">Delete</button>

                            </form>
                     
                         <form id="delete-form" method="post" action="{{ route('admin.users_destroy', $user->id) }}">
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
                      @if ($users->onFirstPage())
                          <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1">
                                  <i class="fas fa-angle-left"></i>
                                  <span class="sr-only">Previous</span>
                              </a>
                          </li>
                      @else
                          <li class="page-item">
                              <a class="page-link" href="{{ $users->previousPageUrl() }}" tabindex="-1">
                                  <i class="fas fa-angle-left"></i>
                                  <span class="sr-only">Previous</span>
                              </a>
                          </li>
                      @endif

                      <!-- Manually render the pagination links -->
                      @foreach ($users as $page => $url)
                          @if ($page == $users->currentPage())
                              <li class="page-item active">
                                 
                              </li>
                          @else
                              <li class="page-item">
                                  
                              </li>
                          @endif
                      @endforeach

                      <!-- Render the next page link -->
                      @if ($users->hasMorePages())
                          <li class="page-item">
                              <a class="page-link" href="{{ $users->nextPageUrl() }}">
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