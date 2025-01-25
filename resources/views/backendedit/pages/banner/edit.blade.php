@extends('backend.layouts.admin')

@section('content')
    <div class="container">
        <!-- Header Section -->
        <div class="row">
            <div class="col-12">
                <div class="from-heading-background-padding from-heading-background-color text-white">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-0">Add new Banner</h4>
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
                        <form action="{{ route('home_banner_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Title Field -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- subtitle Field -->
                            <div class="mb-3">
                                <label for="subtitle" class="form-label">subtitle</label>
                                <input type="text" name="subtitle" class="form-control" id="subtitle"
                                    value="{{ old('subtitle') }}">
                                @error('subtitle')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Textarea Field -->
                            <div class="mb-3">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea name="short_description" id="short_description" class="form-control" rows="4"
                                    placeholder="Enter short description here...">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Button Text Field -->
                            <div class="mb-3">
                                <label for="button_text" class="form-label">Button Text</label>
                                <input type="text" name="button_text" class="form-control" id="button_text"
                                    value="{{ old('button_text') }}">
                                @error('button_text')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Button Url Field -->
                            <div class="mb-3">
                                <label for="button_url" class="form-label">Button Text</label>
                                <input type="text" name="button_url" class="form-control" id="button_url"
                                    value="{{ old('button_url') }}">
                                @error('button_url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                             <!-- Status Field -->
                             <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
