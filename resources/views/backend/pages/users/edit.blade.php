@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!--begin::Header-->
            <div class="d-flex justify-content-between from_heading_margin_top">
                <h3 class="page-titler from_heading_padding_left">Create User Data</h3>
                <h3 class="page-titler from_heading_padding_right"><a class="from_heading_text_decoration_right btn btn-info"
                        href="{{ route('user_index') }}">All Data</a></h3>
            </div> <!--end::Header--> <!--begin::Form-->
            @if (session()->has('success'))
                <script>
                    Swal.fire({
                        title: "Data Updated",
                        text: "{{ session()->get('success') }}",
                        icon: "success"
                    });
                </script>
            @endif
            <div class="col-md-6 from-background">
                <div class="card-body d-flex justify-content-center">
                    <form class="" action="{{ route('user_update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                        id="name">
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
                                        {{-- @foreach ( App\Models\UserRole::get() as $item) --}}
                                        @foreach ($user_roles as $item)
                                        <option {{ $user->role_serial == $item->id ? 'selected' : ''}}
                                            value="{{ $item->role_serial }}">
                                            {{ $item->title }}
                                        </option>
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
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email">
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
                                    <input type="number" name="phone" value="{{ $user->phone_number}}" class="form-control" id="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="image">Choose an Image:</label>
                            <input type="file"  id="image"  name="image" onchange="previewImage(event)">
                            <br>
                            <img class="imgform" id="image-preview" src="/{{ $user->image}}" style="width: 150px"  alt="Image Preview">
                            <br>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-success px-5">Submit</button>                            </div>
                        </div>
                    </form> <!--end::Form-->
                </div>
            </div>
        </div> <!--end::Quick Example-->
    </div>
@endsection
