@extends('components.layouts.app')

@section('content')

    @include('components.treatments.treatment-programs')
    @include('components.treatments.approach')
    @include('components.treatments.process ')
    @include('components.treatments.benefits ')
    @include('components.treatments.cta ')

@endsection