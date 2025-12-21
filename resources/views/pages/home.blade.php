@extends('components.layouts.app')

@section('content')
    @include('components.home.hero')
    @include('components.home.about')
    @include('components.home.treatment-programs')
    @include('components.home.pain-relif')
    @include('components.home.why-choose')
    @include('components.home.stats')
    @include('components.home.our-healers')
    @include('components.home.cta')
@endsection
