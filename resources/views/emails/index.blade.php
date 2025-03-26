@extends('layouts.master')



@section('content')
<div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                      
                      
                    </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('emails.create') }}" class="btn btn-primary">Add New Email</a>
          </div>

                    
                  </div>
          <div class="card shadow">
            
            <div class="card-header border-0">
              <div class="header-body">
                  
                </div>
              <h3 class="mb-0">Email List</h3>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emails as $email)
                  <tr>
                    <td>{{ $email->id }}</td>
                    <td>{{ $email->email }}</td>
                     
                      <td>
                          <a href="{{ route('emails.edit', $email->id) }}" class="btn btn-default">Edit</a>
                          
                          <form action="{{ route('emails.destroy', $email->id) }}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">Delete</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    @endsection
    @section('scripts_links')
     
<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(button) {
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
            // Find the closest form to the button and submit it
            button.closest('form').submit();
        }
    });
}
</script>

@endsection



