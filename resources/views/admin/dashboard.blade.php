@extends('layout.admin')

@section('title', 'Users')

@section('page-title', 'Dashboard')

@section('content')
    <div class="shadow-lg rounded-lg overflow-hidden">
        <div class="py-3 px-5 bg-gray-50">Statistics</div>
        <canvas class="p-10" id="chartStatistics"></canvas>
    </div>
    <script>
        var customers_per_day = @json($customers);
    </script>
@endsection
