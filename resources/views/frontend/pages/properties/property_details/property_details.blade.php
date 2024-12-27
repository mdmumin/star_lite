@extends('frontend.layouts.frontend')
@section('content')
    @include('frontend.pages.properties.property_details.component.property_nav')
    @include('frontend.pages.properties.property_details.component.image_slide')
    @include('frontend.pages.properties.property_details.component.details')
@endsection
