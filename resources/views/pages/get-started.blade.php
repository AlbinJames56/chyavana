@extends('components.layouts.app')

@section('content')
    <div class="min-h-screen bg-white">

        <x-get-started.hero />

        <section class="py-20">
            <div class="container mx-auto  mx-auto px-8 md:px-14 lg:px-28 grid lg:grid-cols-2 gap-12">

                <div>
                    <x-get-started.form />
                    <x-get-started.benefits />
                </div>

                <div class="space-y-8">
                    <x-get-started.contact-cards />
                    <x-get-started.map-card />
                </div>
            </div>
        </section>

        <x-get-started.faq />

    </div>
@endsection