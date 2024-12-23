@extends('frontend.layouts.frontend')
@section('content')
    @include('frontend.pages.news.news_details.component.news_detailsnab')
    @include('frontend.pages.news.news_details.component.news_details')
    {{-- @include('frontend.pages.news.news_details.component.action') --}}
@endsection