@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="py-3 px-4"
                style="background-color: rgb(43, 76, 107);">
                <div class="text-white">
                    <h4 class="mb-0">All Users</h4>
                </div>
                <div>
                    <a class="btn btn-success btn-sm" href="{{ route('home_banner_index') }}">
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
                    <div class=" justify-content-center">
                        <form class="" action="{{ route('home_banner_store') }}" method="POST">
                            @csrf
                            <div class=" mb-3">
                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="sub_title" class="form-label">sub_title</label>
                                    <input type="text" name="sub_title" class="form-control" id="sub_title">
                                    @error('sub_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="sort_descripton" class="form-label">sort_descripton</label>
                                    <textarea class="form-control" name="sort_descripton" id="sort_descripton" cols="10" rows="3"></textarea>
                                    @error('sort_descripton')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="video_url" class="form-label">Video Url</label>
                                    <input type="text" name="video_url" class="form-control" id="video_url">
                                    @error('video_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="button_title" class="form-label">Button Title</label>
                                    <input type="text" name="button_title" class="form-control" id="button_title">
                                    @error('button_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="button_url" class="form-label">Button Url</label>
                                    <input type="text" name="button_url" class="form-control" id="button_url">
                                    @error('button_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" name="status" class="form-control" id="status">
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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




{{-- 
@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="justify-content-between align-items-center py-3 px-4"
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
                    <div class="justify-content-center">
                        <form class="" action="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="number" name="phone" class="form-control" id="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
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
@endsection --}}
