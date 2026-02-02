@extends('client.layouts.app')

@section('title', 'Now | thanhnguyenduyy')
@section('description', 'What I am doing now')

@section('content')
<!-- Now Page -->
<section class="page page-now active" id="page-now">
    <div class="container">
        <div class="now-container">
            <h2 class="now-title font-serif">Now</h2>
            <p class="now-date">Last updated: {{ date('F d, Y') }}</p>

            <div class="now-sections">
                <div class="now-item now-item-active">
                    <h3 class="now-item-title">Learning</h3>
                    <p class="now-item-text">
                        Diving deep into <span class="text-white">WebAssembly</span> and exploring how it can
                        revolutionize video processing in the browser. Also studying <span
                            class="text-white">Medium Format</span> film photography techniques.
                    </p>
                </div>

                <div class="now-item">
                    <h3 class="now-item-title">Building</h3>
                    <p class="now-item-text">
                        Working on a collaborative photo-sharing platform that preserves <span
                            class="text-white">original metadata</span> and high-fidelity colors without
                        compression artifacts.
                    </p>
                </div>

                <div class="now-item">
                    <h3 class="now-item-title">Shooting</h3>
                    <p class="now-item-text">
                        Capturing the <span class="text-white">night market culture</span> of Southeast Asia.
                        Focusing on the interplay between artificial neon lights and human emotion.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
