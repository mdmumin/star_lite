@extends('frontend.layouts.frontend')
@section('content')
<div >
    @include('frontend.pages.gallery.image.component.imagenav')
    @include('frontend.pages.gallery.image.component.image')
</div>
@endsection