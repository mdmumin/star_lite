@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!--begin::Header-->
            <div class="d-flex justify-content-between from_heading_margin_top" >
                <h3 class="page-titler from_heading_padding_left">Create User Data</h3>
                <h3 class="page-titler from_heading_padding_right"><a class="from_heading_text_decoration_right btn btn-info" href="{{ route('user_index') }}">All Data</a></h3>
            </div> <!--end::Header--> <!--begin::Form-->
            @if (session()->has('success'))
                <script>
                    Swal.fire({
                        title: "Successfully Submitted",
                        text: "{{ session()->get('success') }}",
                        icon: "success"
                    });
                </script>
            @endif
           <div class="col-md-6 from-background">
            <div class="card-body d-flex justify-content-center">
                <form class="" action="{{ route('user_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
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
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="number" name="phone" class="form-control" id="phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="image">Choose an Image:</label>
                            <input type="file" id="image" name="image" onchange="previewImage(event)" required>
                            <br>
                            <img class="imgform" id="image-preview" src="#" alt="Image Preview"
                                style="display:none;">
                            <br>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit" name="submit" class="btn btn-success px-5">Submit</button>
                        </div>
                    </div>
                </form> <!--end::Form-->
            </div>
           </div>
        </div> <!--end::Quick Example-->
    </div>
@endsection
