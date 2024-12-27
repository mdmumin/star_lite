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
                    <a class="btn btn-success btn-sm" href="{{ route('user_role_create') }}">
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
                                <th scope="col">Title</th>
                                <th scope="col">Created at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_role as $item)
                            <tr class="align-middle text-center">
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="d-flex justify-content-center">
                                    <!-- Added 2px gap using mx-1 -->
                                    <div class="d-flex">
                                        <a href="{{ route('user_role_edit', $item->id) }}" class="btn btn-primary mx-1">Edit</a>
                                        <form action="{{ route('user_role_delete', $item->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            <button class="btn btn-danger btn-delete mx-1" type="button">Delete</button>
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
