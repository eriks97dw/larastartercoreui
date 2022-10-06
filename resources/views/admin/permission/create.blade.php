@extends('layouts.app')

@section('content')
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">Create Permission</div>
            <div class="card-body">
               <form action="{{ route('admin.permissions.store') }}" method="POST">
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
                     <button type="submit" class="btn btn-primary">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection

