@extends('layouts.app')

@section('content')
@include('sweetalert::alert')

   <div class="row">
    <div class="col-md-12">
        @can('user_create')
        <div class="d-flex mb-3">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary ms-auto">New User</a>
        </div>   
        @endcan
      <div class="card">
        <div class="card-header">User Table</div>
        <div class="card-body">
            <table id="userTable" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($users as $key => $user )
                   <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles as $key => $role )
                        {{ $role->title }}
                        @endforeach
                    </td>
                    <td>
                       @can('user_edit')
                       <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-info text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                       @endcan
                        @can('user_delete')
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                    <path d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z"/>
                                </svg>
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
   </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
    $('#userTable').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'user data'
            },
            {
                extend: 'pdfHtml5',
                title: 'user data'
            },
            {
                extend: 'copyHtml5',
                title: 'user data'
            },
            {
                extend: 'print',
                title: 'user data'
            },
            {
                extend: 'csvHtml5',
                title: 'user data'
            },
            {
                extend: 'pageLength',

            }
            
            // 'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength'
        ]
    } );
} );
    </script>
@endpush