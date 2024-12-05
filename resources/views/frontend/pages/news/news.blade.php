@extends('frontend.layouts.frontend')
@section('content')
    @include('frontend.pages.news.component.newsnav')
    @include('frontend.pages.news.component.newslist')
    @include('frontend.pages.news.component.action')
@endsection