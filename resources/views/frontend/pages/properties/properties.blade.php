@extends('frontend.layouts.frontend')
@section('content')
    @include('frontend.pages.properties.component.property_nav')
    @include('frontend.pages.properties.component.luxury')
    @include('frontend.pages.properties.component.classic')
    @include('frontend.pages.properties.component.wellness')
    @include('frontend.pages.properties.component.comercial')
    @include('frontend.pages.properties.component.ongoing')
    @include('frontend.pages.properties.component.upcoming')
    @include('frontend.pages.properties.component.completed')
@endsection