@extends('layout.app')

@section('title')
    Home Page
@endsection

@section('content-1')
{{-- @include('component.navbar') --}}
@include('landingPage.component.UnivComponent.hero')
@endsection

@section('content-2')
@include('landingPage.component.Home.about')
@endsection

@section('content-3')
{{-- @include('landingPage.component.UnivComponent.card') --}}
@endsection

@section('content-4')
@include('landingPage.component.Home.event')
@endsection

@section('content-5')
@include('landingPage.component.Home.price')
@endsection

@section('content-6')
@include('landingPage.component.Contact.contact')
@endsection

{{--
@section('content-7')
@include('components.Home.ask')
@endsection

@section('content-8')
@include('components.Home.startFree')
@endsection --}}
