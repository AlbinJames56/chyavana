@extends('components.layouts.app')

@section('content')
    @include('components.PainRelief.hero')
    @include('components.PainRelief.conditions', ['conditions' => $conditions])
    @include('components.PainRelief.why-choose')
    @include('components.PainRelief.testimonials', ['testimonials' => $testimonials])
    @include('components.PainRelief.cta')
@endsection
