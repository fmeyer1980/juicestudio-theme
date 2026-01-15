@php
    $headline = get_field('headline');
    $teaser = get_field('teaser');
    $image = get_field('featured_image');
@endphp

@extends('layouts.app')

@section('content')
    <section class="wrapper py-lg grid md:grid-cols-[1fr_.7fr] gap-lg">
        <div class="flow-y">
            <p class="text-current/60">Case</p>
            <h1 class="text-900 flow-space-100">
                @if($headline)
                    {{ $headline }}
                @else
                    {{ get_the_title() }}
                @endif
            </h1>
            @if($teaser)
                <p class="text-current/70 text-500">{{ $teaser }}</p>
            @endif
            @include('components.service-list', ['services' => get_field('services')])
        </div>
        <div class="relative aspect-square rounded-xl overflow-clip image-overlay" style="view-transition-name: case-image-{{ get_the_ID() }};">
            @if($image)
                <img class="absolute inset-0 w-full h-full object-cover" src="{{ $image['sizes']['large'] }}">
            @endif
        </div>
    </section>
    @php(the_content())
@endsection
