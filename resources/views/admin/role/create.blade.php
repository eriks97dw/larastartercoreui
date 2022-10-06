@extends('layouts.app')

@section('content')
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">Create Role</div>
            <div class="card-body">
               <form action="{{ route('admin.roles.store') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                     <label for="title" class="form-label">Title</label>
                     <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="enter title" name="title" required>
                     @error('title')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="mb-3">
                     <label for="permissions" class="form-label">Select Permissions</label>
                     <select class="form-select permissions @error('permissions') is-invalid @enderror" name="permissions[]" id="permissions" multiple required>
                        @foreach($permissions as $id => $permissions)
                            <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                        @endforeach
                    </select>
                     @error('permissions')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="mb-3">
                     <button type="submit" class="btn btn-primary">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection

@push('select2')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <script>
      $(document).ready(function() {
        $('.permissions').select2();
    });
   </script>
@endpush
