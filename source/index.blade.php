@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8">
            <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">A clean, elegant way to structure you Laravel code</h2>

            <p class="text-lg">{{ $page->siteDescription }}</p>

            <div class="flex my-10">
                <a href="/docs/foundation/getting-started" title="{{ $page->siteName }} getting started" class="bg-blue-500 hover:bg-blue-600 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">Get Started</a>
            </div>
        </div>

        <img src="/assets/images/Vivid-02.png" alt="{{ $page->siteName }} large logo" class="mx-auto mb-6 lg:mb-0" width="450px">
    </div>

    <hr class="block my-8 border lg:hidden">

    <div class="md:flex -mx-2 -mx-4">
        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <img src="/assets/img/icon-window.svg" class="h-12 w-12" alt="window icon">

            <h3 id="intro-laravel" class="text-2xl text-blue-900 mb-0">Develop Apps <br>Faster</h3>

            <p>Vivid encourages you to think in terms of small problems, effectively breaking up the complex business requirements.</p>
        </div>

        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <img src="/assets/img/icon-terminal.svg" class="h-12 w-12" alt="terminal icon">

            <h3 id="intro-markdown" class="text-2xl text-blue-900 mb-0">Small Reusable <br>Components</h3>

            <p>With Vivid, the code is written once and is reused throughout the application, eliminating duplication issues.</p>
        </div>

        <div class="mx-3 px-2 md:w-1/3">
            <img src="/assets/img/icon-stack.svg" class="h-12 w-12" alt="stack icon">

            <h3 id="intro-mix" class="text-2xl text-blue-900 mb-0">Embracing the <br>Monolith</h3>

            <p>Separate the different business segments of the application easily using Devices without the complexity of microservices.</p>
        </div>
    </div>
</section>
@endsection
