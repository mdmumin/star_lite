right bootstrap
{{-- @extends('backend.layouts.admin')

@section('content')
<div class="container my-4">
    <div class="page-wrapper">
        <div class="page-content">
            
            <div class="row justify-content-between align-items-center py-3 px-4 from-heading-background-color text-white ">
                <div class="col-md-4">
                    <h4 class="mb-0">All Users</h4>
                </div>
                <div class="col-md-4">
                    <input id="searchInput" class="form-control" type="text" placeholder="Search...">
                </div>
                <div class="col-md-4 text-end">
                    <a class="btn btn-success btn-sm" href="{{ route('user_create') }}">
                        <i class="bi bi-plus"></i> Add New User
                    </a>
                </div>
            </div>

            
            <div class="">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="userTable">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Role Serial</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr class="align-middle text-center">
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img class="img-thumbnail" src="/{{ $item->image }}" alt="User Image" style="width: 50px; height: 50px;">
                                </td>
                                <td>{{ $item->user_role?->title }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->created_at->format("d/m/y") }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('user_edit', $item->id) }}" class="btn btn-primary btn-sm mx-1">Edit</a>
                                        <a href="#" class="btn btn-info btn-sm mx-1">View</a>
                                        <form action="{{ route('user_delete', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-danger btn-sm btn-delete" type="button">Delete</button>
                                        </form>
                                    </div>
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
@endsection --}}


2nd boot 
{{-- @extends('backend.layouts.admin')
@section('content')
    <div class="container">
        <div class="page-wrapper">
            <div class="page-content">
               
                <div class="d-flex justify-content-between align-items-center py-3 px-4 bg-primary text-white rounded">
                    <div>
                        <h4 class="mb-0">All Users</h4>
                    </div>
                    <div class="w-25">
                        <input id="searchInput" class="form-control" type="text" placeholder="Search...">
                    </div>
                    <div>
                        <a class="btn btn-success btn-sm" href="{{ route('user_create') }}">
                            <i class="bi bi-plus"></i> Add New User
                        </a>
                    </div>
                </div>

             
                <div class="table-container mt-4">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped table-hover text-center" id="userTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Role Serial</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <img class="img-thumbnail" src="/{{ $item->image }}" alt="User Image" style="max-width: 100px; height: auto;">
                                            </td>
                                            <td>{{ $item->user_role?->title }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->created_at->format('d/m/y') }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('user_edit', $item->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                                                    <a href="#" class="btn btn-info btn-sm me-2">View</a>
                                                    <form action="{{ route('user_delete', $item->id) }}" method="POST" class="delete-form">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm btn-delete" type="button" onclick="confirmDelete(event)">Delete</button>
                                                    </form>
                                                </div>
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
    </div>

    <script>
        function confirmDelete(event) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.closest('form').submit();
                }
            });
        }
    </script>
@endsection --}}



right 

{{-- @extends('backend.layouts.admin')
@section('content')
    <div class="container">
        <div class="page-Wrapper">
            <div class="page-content">
                <!-- Header Section -->
                <div class="row py-3 px-4" style="background-color: rgb(43, 76, 107);">
                    <div class="col-md-4">
                        <div class="text-white">
                            <h4 class="mb-0">All Users</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input id="searchInput" class="form-control w-55" type="text" placeholder="Search...">
                    </div>
                    <div class="col-md-4">
                        <div class="text-end">
                            <a class="btn btn-success btn-sm" href="{{ route('user_create') }}">
                                <h6 class="mb-0"><i class="bi bi-plus"></i>Add New User</h6>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="table-container">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover" id="userTable">
                            <thead class="bg-color-thead">
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Role Serial</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr class="align-middle text-center">
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div>
                                                <img class="index-img-size" src="/{{ $item->image }}" alt="User Image">
                                            </div>
                                        </td>
                                        <td>{{ $item->user_role?->title }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ route('user_edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" class="btn btn-info btn-sm mx-2">View</a>
                                                <form action="{{ route('user_delete', $item->id) }}" method="POST"
                                                    class="delete-form">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm btn-delete"
                                                        type="button">Delete</button>
                                                </form>
                                            </div>
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
@endsection --}}



