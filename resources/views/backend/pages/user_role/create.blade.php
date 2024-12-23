@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!--begin::Header-->
            <div class="d-flex justify-content-between from_heading_margin_top">
                <h3 class="page-titler from_heading_padding_left">Create User Role Data</h3>
                <h3 class="page-titler from_heading_padding_right"><a class="from_heading_text_decoration_right btn btn-info"
                        href="{{ route('user_index') }}">All Data</a></h3>
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
                    <form action="{{ route('user_role_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="serial" class="form-label">Role Serial</label>
                                    <input type="number" name="serial" class="form-control" id="serial">
                                    @error('role_serial')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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
