@extends('layouts.app')

@section('content')
    <!-- start header -->
    @include('partials.header')
    <!-- end header -->
    
    <!-- start section -->
    @include('partials.projects')
    @include('partials.services')
    @include('partials.about')
    @include('partials.contact')
    <!-- end section -->

    <!-- start footer -->
    @include('partials.footer')
    <!-- end footer -->
@endsection
