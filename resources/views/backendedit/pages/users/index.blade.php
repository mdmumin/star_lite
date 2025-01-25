@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <div class="page-Wrapper">
            <div class="page-content">
                <!-- Header Section -->
                <form action="{{ route('user_search') }}" method="GET">
                    <div
                        class="d-flex justify-content-between align-items-center from-heading-background-padding from-heading-background-color">
                        <div class="text-white">
                            <h4 class="mb-0">All Users</h4>
                        </div>
                        <input id="searchInput" name="search" class="form-control w-25" type="text"
                            placeholder="Search..." value="{{ request('search') }}">
                        <div>
                            <a class="btn btn-success btn-sm" href="{{ route('user_create') }}">
                                <h6 class="mb-0"><i class="bi bi-plus"></i>Add New User</h6>
                            </a>
                        </div>
                    </div>
                </form>
                <!-- Table Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-container">
                            <div class="table-responsive">
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
                                                        <img class="index-img-size" src="/{{ $item->image }}"
                                                            alt="User Image">
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

                                <!-- Render Pagination Links -->

                                {{ $user->links('vendor.pagination.bootstrap-5') }}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Start Data Delete JavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all delete buttons
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const form = this.closest('.delete-form');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });
    </script>

    {{-- <script>
        $(document).on('keyup', function(e) {
            e.preventDefault();
            let search_string = $('#searchInput').val();
            $.ajax({
                url:"{{ route('user_search') }}",
                method:'GET',
                data:{search_string:search_string},
                success:function(res){
                    $('.table-data').html(res)
                }
            })
        })
    </script> --}}

    <!-- jQuery with Integrity -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEJr8t1+7Poh1Gj7Y3KMykz0ZPzqj7q+e4/jrKtySAjQChB1XfAA3bCBQYsdn" crossorigin="anonymous">
    </script> --}}
    <!-- Bootstrap 5 bundle (minified) via CDN -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}

    {{-- End Data Delete JavaScript --}}
@endsection
