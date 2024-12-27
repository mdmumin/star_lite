@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between align-items-center py-3 px-4"
                style="background-color: rgb(43, 76, 107);">
                <div class="text-white">
                    <h4 class="mb-0">All Users</h4>
                </div>
                <div>
                    <a class="btn btn-success btn-sm" href="{{ route('user_index') }}">
                        <h6 class="mb-0">All Data</h6>
                    </a>
                </div>
            </div>
            @if (session()->has('success'))
                <script>
                    Swal.fire({
                        title: "Successfully Submitted",
                        text: "{{ session()->get('success') }}",
                        icon: "success"
                    });
                </script>
            @endif
            <div class="col-md-6">
                <div class="form-background">
                    <div class="d-flex justify-content-center">
                        <form class="" action="{{ route('user_store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="role_serial" class="form-label">Role Serial</label>
                                    <select name="role_serial" class="form-control" id="">
                                        {{-- @foreach (App\Models\UserRole::get() as $item) --}}
                                        @foreach ($user_roles as $item)
                                            <option value="{{ $item->role_serial }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_serial')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="number" name="phone" class="form-control" id="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image">Choose an Image:</label>
                                <input type="file" id="image" name="image" onchange="previewImage(event)">
                                <br>
                                <img class="imgform" id="image-preview" src="#" alt="Image Preview"
                                    style="display:none;">
                                <br>
                            </div>
                            <div class="row mb-0">
                                <div class="col-sm-9">
                                    <button type="submit" name="submit" class="btn btn-success px-5">Submit</button>
                                </div>
                            </div>
                        </form> <!--end::Form-->
                    </div>
                </div>
            </div>
        </div> <!--end::Quick Example-->
    </div>
@endsection
