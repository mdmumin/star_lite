@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <!-- Header Section -->
        <div class="row">
            <div class="col-12">
                <div class="from-heading-background-padding from-heading-background-color text-white">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-0">Edit User</h4>
                        </div>
                        <div class="col-md-4">
                            <div class=" text-end">
                                <a class="btn btn-success btn-sm" href="{{ route('user_index') }}">
                                    <i class="bi bi-arrow-left"></i> All Data
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        @if (session()->has('success'))
            <script>
                Swal.fire({
                    title: "Successfully Submitted",
                    text: "{{ session()->get('success') }}",
                    icon: "success"
                });
            </script>
        @endif
        <!-- Form Section -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Add New User</h5>
                        <form action="{{ route('user_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Role Serial Field -->
                            <div class="mb-3">
                                <label for="role_serial" class="form-label">Role Serial</label>
                                <select name="role_serial" class="form-control" id="role_serial">
                                    @foreach ($user_roles as $item)
                                        <option value="{{ $item->role_serial }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @error('role_serial')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Phone Number Field -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Image Upload Field -->
                            <div class="mb-3">
                                <label for="image">Choose an Image:</label>
                                <input type="file" id="image" name="image" onchange="previewImage(event)">
                                <br>
                                <img class="imgform" id="image-preview" src="#" alt="Image Preview"
                                    style="display:none;">
                                <br>
                            </div>

                            <!-- Submit Button -->
                            <div class="">
                                <button type="submit" class="btn btn-success px-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    @endsection
