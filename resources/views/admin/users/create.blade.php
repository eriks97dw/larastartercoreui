@extends('layouts.app')

@section('content')
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">Create Users</div>
            <div class="card-body">
               <form action="{{ route('admin.users.store') }}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="name" class="form-label">Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="enter name" name="name" required>
                           @error('name')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="email" class="form-label">Email address</label>
                           <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="enter email" name="email" required>
                           @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="roles" class="form-label">Role</label>
                           <select class="form-control select2 @error('roles') is-invalid @enderror" name="roles[]" id="roles" multiple required>
                              @foreach($roles as $id => $roles)
                                  <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                              @endforeach
                          </select>
                           @error('roles')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="password" class="form-label">Password</label>
                           <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                           @error('password')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="password_confirmation" class="form-label">Confirm Password</label>
                           <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                           @error('password_confirmation')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                     </div>
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
        $('.select2').select2();
    });
   </script>
@endpush
