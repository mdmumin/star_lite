@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!--begin::Header-->
            <div class="d-flex justify-content-between align-items-center py-3 px-4"
                style="background-color: rgb(43, 76, 107);">
                <div class="text-white">
                    <h4 class="mb-0">All Users</h4>
                </div>
                <div>
                    <a class="btn btn-success btn-sm" href="{{ route('user_role_index') }}">
                        <h6 class="mb-0"></i>All Data</h6>
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
                        <form action="{{ route('user_role_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="serial" class="form-label">Role Serial</label>
                                    <input type="number" name="serial" class="form-control" id="serial">
                                    @error('role_serial')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
            </div>
        </div> <!--end::Quick Example-->
    </div>
@endsection
