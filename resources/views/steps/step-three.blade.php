@extends('layout.app')

@section('title', 'Home')

@section('content')
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Submit a form</h2>

                <div class="mt-10 flex items-center justify-between">
                    <div class="block px-4 py-2 max-w-sm bg-white rounded-lg border border-gray-200">
                        <p>Step 1</p>
                    </div>
                    <div class="block px-4 py-2 max-w-sm bg-white rounded-lg border border-gray-200">
                        <p>Step 2</p>
                    </div>
                    <div class="block px-4 py-2 max-w-sm bg-sky-400 text-white rounded-lg border border-gray-200">
                        <p>Step 3</p>
                    </div>
                </div>

                <form class="mt-6" action="{{ route('steps.step.three') }}" method="post">
                    @csrf
                    <div class="mb-6">
                        <label for="q6" class="block mb-2 text-sm font-medium text-gray-900">Question 6</label>
                        <input id="q6" name="q6" type="text"
                               class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">

                        @error('q6')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="flex mt-4 flex-col">
                        <button type="submit"
                                class="text-white bg-sky-400 hover:bg-sky-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                            Finish
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
