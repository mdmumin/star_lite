@extends('backend.layouts.admin')
@section('content')
    <div class="container">
        <div class="page-Wrapper">
            <div class="page-content">
                <div class="d-flex justify-content-between from_heading_margin_bottom">
                    <h3 class="">User Data Table</h3>
                    <input id="searchInput" class="form-control w-25" type="text" placeholder="Search...">
                </div>
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table" id="userTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Created at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_role as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('user_role_edit', $item->id) }}"><i class="btn btn-primary">Edit</i></a>
                                        <a href=""><i class="btn btn-info mx-1">View</i></a>
                                        <form action="{{ route('user_role_delete', $item->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            <button class="btn btn-danger btn-delete" type="button">Delete</button>
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
