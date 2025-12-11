@extends('components.layouts.app')

@section('content')
    @include('components.OurStory.hero')
    @include('components.OurStory.mission-vision')
    @include('components.OurStory.core-values', ['values' => $values])
    @include('components.OurStory.principles', ['principles' => $principles])
    @include('components.OurStory.why-choose', ['whyChoose' => $whyChoose])
    @include('components.OurStory.stats', ['stats' => $stats])
    @include('components.OurStory.cta')
@endsection
