@extends('layouts.app')

@section('content')
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">Edit Users</div>
            <div class="card-body">
               <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                  @csrf
                  @method('put')
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="name" class="form-label">Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="enter name" name="name" value="{{ old('name', $user->name) }}" required>
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
                           <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="enter email" name="email" value="{{ old('email', $user->email) }}" required>
                           @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="roles" class="form-label">Select Role</label>
                           <select name="roles[]" id="roles" class="form-control select3  @error('roles') is-invalid @enderror " multiple required>
                              @foreach ($roles as $id => $roles)
                                 <option value="{{ $id }}"{{ in_array($id, old('roles', [])) || $user->roles->contains($id) ? 'selected' : '' }}>{{ $roles }}</option>
                              @endforeach
                           </select>
                           @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="password" class="form-label">Password</label>
                           <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                           @error('password')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
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
        $('.select3').select2();
    });
   </script>
@endpush
