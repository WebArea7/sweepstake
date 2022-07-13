@extends('layout.app')

@section('title', 'Home')

@section('content')
    <div class="text-center pb-12 md:pb-16 mt-10">
        <h1 class="text-5xl md:text-6xl font-extrabold leading-tighter tracking-tighter mb-4">
            Submit our <span
                class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-teal-400">form</span>
        </h1>
        <div class="max-w-3xl mx-auto">
            <p class="text-xl text-gray-600 mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lacus egestas, dignissim turpis quis, accumsan tortor. Quisque placerat tortor tellus, quis sodales risus interdum in.</p>
            <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center">
                <a href="{{ route('steps.step.one') }}"
                   class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                    Start a form
                </a>
            </div>
        </div>
    </div>
@endsection
