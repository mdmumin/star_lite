@extends('backend.layouts.admin')
@section('content')
<div class="container">
    <div class="page-Wrapper">
        <div class="page-content">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center py-3 px-4" style="background-color: rgb(43, 76, 107);">
                <div class="text-white">
                    <h4 class="mb-0">All Users</h4>
                </div>
                <input id="searchInput" class="form-control w-25" type="text" placeholder="Search...">
                <div>
                    <a class="btn btn-success btn-sm" href="{{ route('user_create') }}">
                        <h6 class="mb-0"><i class="bi bi-plus"></i>Add New User</h6>
                    </a>
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
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr class="align-middle text-center">
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div >
                                            <img class="index-img-size" src="/{{ $item->image }}" alt="User Image">
                                        </div>
                                    </td>
                                    <td>{{ $item->user_role?->title }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->created_at->format("d/m/y") }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('user_edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="#" class="btn btn-info btn-sm mx-2">View</a>
                                            <form action="{{ route('user_delete', $item->id) }}" method="POST" class="delete-form">
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

@endsection
