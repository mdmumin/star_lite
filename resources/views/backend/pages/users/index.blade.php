@extends('backend.layouts.admin')
@section('content')
    <div class="container">
        <div class="page-Wrapper">
            <div class="page-content">
                <div class="d-flex justify-content-between from_heading_margin_bottom">
                    <div>
                        <a class="from_heading_text_decoration_right btn-info" href="{{ route('user_create') }}"><h4>Create user Data</h4></a> 
                    </div>
                    <input id="searchInput" class="form-control w-25" type="text" placeholder="Search...">
                </div>
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table mb-0" id="userTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Role Serial</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Updated at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="/{{ $item->image }}" height="60" alt="" srcset="">
                                        </td>
                                        <td>{{ $item->user_role?->title }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('user_edit', $item->id) }}"><i
                                                    class="btn btn-primary">Edit</i></a>
                                            <a href=""><i class="btn btn-info mx-1">View</i></a>
                                            <form action="{{ route('user_delete', $item->id) }}" method="POST" class="delete-form">
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

    <!-- Include SweetAlert2 -->
    
@endsection
